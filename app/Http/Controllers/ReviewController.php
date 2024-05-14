<?php

namespace App\Http\Controllers;

use App\Models\ComentarioReview;
use App\Models\Juego;
use App\Models\ReviewJuego;
use App\Models\TipoValoracion;
use App\Models\User;
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

    // Recalcular la valoración del juego
    $juego->valoracion_juego = $this->calcularValoracionJuego($request->juego);
    $juego->save();

    // Redirigir a la página del juego utilizando su nombre
    return redirect()->route('juego.show', ['nombre' => $nombreJuego]);
}


    public function show($id)
    {
        // Recuperar la reseña por su ID
        $review = ReviewJuego::findOrFail($id);

        // Obtener los autores de las reseñas
        $autoresResenas = User::whereIn('id', [$review->autor_review])->get();

        // Recuperar los comentarios asociados a esta reseña
        $comentarios = ComentarioReview::where('review_id', $id)->get();

        // Obtener los autores de los comentarios
        $autoresComentarios = [];

        $autoresComentarios = collect(); // Inicializa una colección vacía

        foreach ($comentarios as $comentario) {
            $autorComentario = User::findOrFail($comentario->autor_comentario);
            $autoresComentarios->push($autorComentario); // Agrega el autor del comentario a la colección
        }

        // Ahora puedes usar $autoresComentarios para acceder a los autores de los comentarios

        // Obtener los tipos de valoración
        $tiposValoracion = TipoValoracion::all();

        // Retornar la vista junto con los datos necesarios
        return view('comentreview', compact('review', 'comentarios', 'autoresResenas', 'autoresComentarios', 'tiposValoracion'));
    }

    public function calcularValoracionJuego($idJuego)
    {
        // Obtener las reviews del juego específico
        $reviews = ReviewJuego::where('juego', $idJuego)->get();

        // Contar el número total de reviews y el número de reviews positivas (tipo_review 1)
        $totalReviews = $reviews->count();
        $reviewsPositivas = $reviews->where('tipo_review', 1)->count();

        // Calcular el porcentaje de reviews positivas sobre el total de reviews
        $porcentajePositivas = ($totalReviews > 0) ? ($reviewsPositivas / $totalReviews) * 100 : 0;

        // Devolver el porcentaje como la valoración del juego
        return $porcentajePositivas;
    }


}
