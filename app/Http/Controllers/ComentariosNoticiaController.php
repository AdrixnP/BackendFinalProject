<?php

namespace App\Http\Controllers;

use App\Models\ComentarioNoticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosNoticiaController extends Controller
{
    public function submitComentarioNoticia(Request $request)
{
    // Validar los datos de la solicitud
    $request->validate([
        'texto' => 'required|string',
        'noticia' => 'required|exists:noticias,id',
    ]);

    // Obtener el ID del usuario autenticado
    $autorId = Auth::id();

    // Crear el comentario en la base de datos
    $comentario = new ComentarioNoticia();
    $comentario->texto_comentario = $request->texto;
    $comentario->noticia = $request->noticia;
    $comentario->autor_comentario = $autorId;

    // Guardar el comentario
    $comentario->save();

    // Redirigir a la página de la noticia
    return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
}
}
