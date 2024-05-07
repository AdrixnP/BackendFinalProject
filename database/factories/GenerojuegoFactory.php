<?php

namespace Database\Factories;

use App\Models\Generojuego;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenerojuegoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Generojuego::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'imagen' => $this->faker->imageUrl(128, 128),
            'color' => $this->faker->hexColor,
        ];
    }
}
