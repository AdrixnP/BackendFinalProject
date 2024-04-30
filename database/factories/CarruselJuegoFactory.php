<?php

namespace Database\Factories;

use App\Models\CarruselImg;
use App\Models\CarruselImgJuego;
use App\Models\CarruselJuego;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarruselJuegoFactory extends Factory
{
    protected $model = CarruselJuego::class;

    public function definition()
    {
        return [
            'ubicacion_imagen' => $this->faker->imageUrl(1024, 576),
            'juego' => $this->faker->randomNumber(),
        ];
    }
}
