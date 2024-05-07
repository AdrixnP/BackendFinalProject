<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;

class ComunidadController extends Controller
{
    public function index()
    {
        // Obtener los juegos con mayor valoración
        $juegosDestacados = Juego::orderBy('valoracion_juego', 'desc')->take(16)->get();

        return view('comunidad', compact('juegosDestacados'));
    }
}
