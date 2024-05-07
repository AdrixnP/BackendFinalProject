<?php
namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        // Obtener las noticias destacadas (las 8 más recientes)
        $noticiasDestacadas = Noticia::orderBy('horapublicación_noticia', 'desc')->take(6)->get();

        // Obtener todas las noticias restantes (a partir de la novena)
        $noticiasRestantes = Noticia::orderBy('horapublicación_noticia', 'desc')->get();

        return view('noticias', compact('noticiasDestacadas', 'noticiasRestantes'));
    }
}

