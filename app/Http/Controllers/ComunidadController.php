<?php

namespace App\Http\Controllers;

use App\Models\Generojuego;
use App\Models\Juego;
use Illuminate\Http\Request;

class ComunidadController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todos los juegos destacados
        $juegosDestacados = Juego::orderBy('valoracion_juego', 'desc')->take(16)->get();

        // Obtener todos los géneros de juegos
        $generos = Generojuego::all();

        // Por defecto, establecer el nombre del género seleccionado como vacío
        $nombreGeneroSeleccionado = '';

        // Obtener los juegos por género si se seleccionó uno
        $juegosPorGenero = [];
        if ($request->has('id')) {
            $generoId = $request->input('id');
            $genero = Generojuego::find($generoId);
            if ($genero) {
                $nombreGeneroSeleccionado = $genero->nombre;
                $juegosPorGenero = Juego::where('genero_juego', $generoId)->get();
            }
        }

        // Obtener todos los juegos
        $todosjuegos = Juego::orderBy('fechasalida_juego', 'desc')->get();

        // Pasar los juegos destacados, los géneros, el nombre del género seleccionado, los juegos por género y todos los juegos a la vista
        return view('comunidad', compact('juegosDestacados', 'generos', 'nombreGeneroSeleccionado', 'juegosPorGenero', 'todosjuegos'));
    }
}
