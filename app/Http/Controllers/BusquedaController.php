<?php
namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Noticia;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    public function buscar(Request $request)
    {
        $query = $request->input('q');

        $juegos = Juego::where('nombre_juego', 'like', "%$query%")->get();
        $noticias = Noticia::where('titulo_noticia', 'like', "%$query%")->get();

        return view('resultados', compact('juegos', 'noticias'));
    }
}
