<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\ComentarioNoticia;
use App\Models\User;

class VerNoticiaController extends Controller
{
    public function show($id)
    {
        // Buscar la noticia por su ID
        $noticia = Noticia::findOrFail($id);

        // Obtener los comentarios asociados a la noticia
        $comentarios = ComentarioNoticia::where('noticia', $noticia->id)->get();

        $autoresComentarios = collect(); // Inicializa una colección vacía

        foreach ($comentarios as $comentario) {
            $autorComentario = User::findOrFail($comentario->autor_comentario);
            $autoresComentarios->push($autorComentario); // Agrega el autor del comentario a la colección
        }

        // Retornar la vista con los datos de la noticia
        return view('vernoticia', compact('noticia', 'comentarios', 'autoresComentarios'));
    }
}
