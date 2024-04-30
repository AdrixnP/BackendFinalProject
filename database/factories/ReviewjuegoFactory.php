<?php
namespace Database\Factories;

use App\Models\ReviewJuego;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewJuegoFactory extends Factory
{
    protected $model = ReviewJuego::class;

    public function definition()
    {
        return [
            'autor_review' => $this->faker->randomNumber(),
            'juego' => $this->faker->randomNumber(),
            'titulo_review' => $this->faker->sentence,
            'texto_review' => $this->faker->paragraph,
            'tipo_review' => $this->faker->numberBetween(1, 5),
            'estrellas_review' => $this->faker->numberBetween(1, 5),
        ];
    }
}
