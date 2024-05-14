<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class VerNoticiaController extends Controller
{
    public function show($id)
    {
        // Buscar la noticia por su ID
        $noticia = Noticia::findOrFail($id);

        // Retornar la vista con los datos de la noticia
        return view('vernoticia', compact('noticia'));
    }
}
