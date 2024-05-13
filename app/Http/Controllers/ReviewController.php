<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\ReviewJuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submit(Request $request)
    {
        // Validar los datos de la solicitud
        $request->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
            'tipo_review' => 'required|exists:tipo_valoracions,id', // Asegúrate de que el tipo de valoración exista en la tabla tipo_valoracions
            'juego' => 'required|exists:juegos,id', // Asegúrate de que el juego exista en la tabla juegos
        ]);

        // Obtener el ID del usuario autenticado
        $autorId = Auth::id();

        // Buscar el juego por su ID para obtener su nombre
        $juego = Juego::findOrFail($request->juego);
        $nombreJuego = $juego->nombre_juego;

        // Crear la reseña en la base de datos
        $review = new ReviewJuego();
        $review->titulo_review = $request->titulo;
        $review->texto_review = $request->texto;
        $review->tipo_review = $request->tipo_review;
        $review->autor_review = $autorId; // Asignar el ID del usuario como autor de la reseña
        $review->juego = $request->juego; // Asignar el ID del juego al que se refiere la reseña
        $review->estrellas_review = 0;

        // Guardar la reseña
        $review->save();

        // Redirigir a la página del juego utilizando su nombre
        return redirect()->route('juego.show', ['nombre' => $nombreJuego]);
    }
}
