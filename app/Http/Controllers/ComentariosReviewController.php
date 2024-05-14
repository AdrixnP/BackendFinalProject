<?php

namespace App\Http\Controllers;

use App\Models\ComentarioReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosReviewController extends Controller
{
    public function submitComentario(Request $request)
{
    // Validar los datos de la solicitud
    $request->validate([
        'texto' => 'required|string',
        'review_id' => 'required|exists:review_juegos,id', // Asegúrate de que la reseña exista en la tabla reviews
    ]);

    // Obtener el ID del usuario autenticado
    $autorId = Auth::id();

    // Crear el comentario en la base de datos
    $comentario = new ComentarioReview();
    $comentario->texto_comentario = $request->texto;
    $comentario->autor_comentario = $autorId; // Asignar el ID del usuario como autor del comentario
    $comentario->review_id = $request->review_id; // Asignar el ID de la reseña a la que se refiere el comentario

    // Guardar el comentario
    $comentario->save();

    // Redirigir a la página de la reseña
    return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
}

    public function destroy($id)
    {
        // Buscar el comentario por su ID
        $comentario = ComentarioReview::findOrFail($id);

        // Eliminar el comentario de la base de datos
        $comentario->delete();

        // Redirigir de vuelta a la página de la reseña o a donde sea apropiado
        return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
    }

}
