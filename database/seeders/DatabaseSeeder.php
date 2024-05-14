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
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->times(5)->create();
        $usuarios = User::all();
        Noticia::factory()->times(3)->create();
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

        Juego::create([
            'nombre_juego' => 'Fallout 76',
            'valoracion_juego' => 0,
            'descripcion_juego' => 'Bethesda Game Studios te da la bienvenida a Fallout 76. Veinticinco años después de la caída de las bombas, saldrás junto a los demás moradores del refugio a la América posnuclear. Explora un amplio Yermo en este juego multijugador de mundo abierto que completa la historia de Fallout.',
            'portada_juego' => 'https://www.gamespot.com/a/uploads/scale_tiny/box/3/8/2/2/482770-673822.jpg',
            'banner_juego' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1151340/header.jpg?t=1715002034',
            'fechasalida_juego' => Carbon::createFromFormat('Y-m-d', '2020-04-14')->format('Y-m-d'),
            'desarrollador_juego' => 'Bethesda Game Studios',
            'genero_juego' => 6,
            'link_compra_juego' => 'https://store.steampowered.com/app/1151340/Fallout_76/',
        ]);

        for ($i = 0; $i < 4; $i++) {
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

        for ($i = 0; $i < 0; $i++) {
            $noticia = $noticias->random();
            $autor = $usuarios->random();
            ComentarioNoticia::factory()->create([
                'autor_comentario' => $autor->id,
                'noticia' => $noticia->id,
            ]);
        }

        for ($i = 0; $i < 0; $i++) {
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

        for ($i = 0; $i < 0; $i++) {
            $review = $reviews->random();
            $autor = $usuarios->random();
            ComentarioReview::factory()->create([
                'autor_comentario' => $autor->id,
                'review_id' => $review->id,
            ]);
        }

        for ($i = 0; $i < 76; $i++) {
            $juego = $juegos->random();
            CarruselJuego::factory()->create([
                'juego' => $juego->id,
            ]);
        }
    }
}
