<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Juego;
use App\Models\ReviewJuego;
use App\Models\TipoValoracion;
use Illuminate\Http\Request;

class PerfilUsuarioController extends Controller
{
    public function mostrarPerfil($id)
    {
        $usuario = User::findOrFail($id);
        $reseñas = ReviewJuego::where('autor_review', $id)->get();
        $juegos = Juego::all();
        $tiposValoracion = TipoValoracion::all();

        return view('perfil', compact('usuario', 'reseñas', 'juegos', 'tiposValoracion'));
    }
}
