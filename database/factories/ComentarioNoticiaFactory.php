<?php

namespace Database\Factories;

use App\Models\ComentarioNoticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioNoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComentarioNoticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'autor_comentario' => $this->faker->randomNumber(),
            'noticia' => $this->faker->randomNumber(),
            'texto_comentario' => $this->faker->sentence,
        ];
    }
}
