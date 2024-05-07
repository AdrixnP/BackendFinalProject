<?php

namespace Database\Seeders;

use App\Models\CarruselJuego;
use App\Models\ComentarioNoticia;
use App\Models\ComentarioReview;
use App\Models\Generojuego;
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
        User::factory()->times(800)->create();
        $usuarios = User::all();
        Noticia::factory()->times(200)->create();
        $noticias = Noticia::all();

        $generos = [
            'Simulación', 'Tiros', 'Estrategia', 'Acción y Aventura',
            'Clásicos', 'Juegos de Rol', 'Juegos de Mesa', 'Plataformas',
            'Familiares', 'Lucha', 'Indie', 'Carreras', 'Deportes', 'Puzles'
        ];
        foreach ($generos as $genero) {
            Generojuego::factory()->create([
                'nombre' => $genero,
            ]);
        }
        $generotabla = Generojuego::all();

        for ($i = 0; $i < 600; $i++) {
            $generoselect = $generotabla->random();
            Juego::factory()->create([
                'genero_juego' => $generoselect->id,
            ]);
        }
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

        for ($i = 0; $i < 80; $i++) {
            $noticia = $noticias->random();
            $autor = $usuarios->random();
            ComentarioNoticia::factory()->create([
                'autor_comentario' => $autor->id,
                'noticia' => $noticia->id,
            ]);
        }

        for ($i = 0; $i < 1200; $i++) {
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

        for ($i = 0; $i < 100; $i++) {
            $review = $reviews->random();
            $autor = $usuarios->random();
            ComentarioReview::factory()->create([
                'autor_comentario' => $autor->id,
                'review_id' => $review->id,
            ]);
        }

        for ($i = 0; $i < 2400; $i++) {
            $juego = $juegos->random();
            CarruselJuego::factory()->create([
                'juego' => $juego->id,
            ]);
        }
    }
}
