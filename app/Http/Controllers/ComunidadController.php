<?php
namespace App\Http\Controllers;

use App\Models\Generojuego;
use App\Models\Juego;
use Illuminate\Http\Request;

class ComunidadController extends Controller
{
    public function index()
    {
        // Obtener los juegos con mayor valoración
        $juegosDestacados = Juego::orderBy('valoracion_juego', 'desc')->take(16)->get();

        // Obtener todos los géneros de juegos
        $generos = Generojuego::all(); // Obtener todos los géneros de la tabla generojuegos

        $todosjuegos = Juego::orderBy('fechasalida_juego', 'desc')->get();

        // Pasar los juegos destacados y los géneros a la vista
        return view('comunidad', compact('juegosDestacados', 'generos', 'todosjuegos'));
    }
}
