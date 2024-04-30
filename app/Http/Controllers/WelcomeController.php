<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Juego;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Obtener las 6 noticias más recientes
        $noticias = Noticia::orderBy('horapublicación_noticia', 'desc')->take(6)->get();

        // Obtener los juegos con más valoración
        $juegos = Juego::orderBy('valoracion_juego', 'desc')->take(12)->get();

        // Pasar los datos a la vista welcome.blade.php
        return view('welcome', compact('noticias', 'juegos'));
    }
}
