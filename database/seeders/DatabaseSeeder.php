<?php

namespace Database\Seeders;

use App\Models\CarruselJuego;
use App\Models\ComentarioNoticia;
use App\Models\ComentarioReview;
use App\Models\Juego;
use App\Models\Noticia;
use App\Models\ReviewJuego;
use App\Models\TipoValoracion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->times(40)->create();
        $usuarios = User::all();
        Noticia::factory()->times(16)->create();
        $noticias = Noticia::all();
        Juego::factory()->times(60)->create();
        $juegos = Juego::all();

        TipoValoracion::factory()->create([
            'nombre_val' => 'buena',
            'imagen_val' => 'images/buena.png',
        ]);
        TipoValoracion::factory()->create([
            'nombre_val' => 'mala',
            'imagen_val' => 'images/mala.png',
        ]);
        $valoraicon = TipoValoracion::all();

        for ($i = 0; $i < 16; $i++) {
            $noticia = $noticias->random();
            $autor = $usuarios->random();
            ComentarioNoticia::factory()->create([
                'autor_comentario' => $autor->id,
                'noticia' => $noticia->id,
            ]);
        }

        for ($i = 0; $i < 60; $i++) {
            $juego = $juegos->random();
            $autor = $usuarios->random();
            $tipo = $valoraicon->random();
            ReviewJuego::factory()->create([
                'autor_review' => $autor->id,
                'juego' => $juego->id,
                'tipo_review' => $tipo->id,
            ]);
        }
        $reviews = ReviewJuego::all();

        for ($i = 0; $i < 20; $i++) {
            $review = $reviews->random();
            $autor = $usuarios->random();
            ComentarioReview::factory()->create([
                'autor_comentario' => $autor->id,
                'review_id' => $review->id,
            ]);
        }

        for ($i = 0; $i < 200; $i++) {
            $juego = $juegos->random();
            CarruselJuego::factory()->create([
                'juego' => $juego->id,
            ]);
        }
    }
}
