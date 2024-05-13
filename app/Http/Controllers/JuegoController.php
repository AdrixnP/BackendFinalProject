<?php

namespace App\Http\Controllers;

use App\Models\CarruselJuego;
use App\Models\Juego;
use App\Models\ReviewJuego;
use App\Models\TipoValoracion;
use App\Models\User;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function show($nombre)
    {
        // Buscar el juego por su nombre
        $juego = Juego::where('nombre_juego', $nombre)->firstOrFail();

        // Obtener las imágenes del juego por su ID
        $imagenesJuego = CarruselJuego::where('juego', $juego->id)->get();

        // Obtener las reseñas del juego
        $reviews = ReviewJuego::where('juego', $juego->id)->get();

        // Obtener los tipos de valoración
        $tiposValoracion = TipoValoracion::all();

        // Obtener los autores de las reseñas
        $autores = User::whereIn('id', $reviews->pluck('autor_review'))->get();

        // Pasar los datos a la vista
        return view('juegoinfo', compact('juego', 'imagenesJuego', 'reviews', 'tiposValoracion', 'autores'));
    }
}
