<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'autor_noticia' => $this->faker->name(),
            'titulo_noticia' => $this->faker->sentence(),
            'portada_noticia' => $this->faker->imageUrl(1512, 648),
            'resumen_noticia' => $this->faker->paragraph(4),
            'texto_noticia' => $this->faker->paragraph(32),
            'horapublicación_noticia' => $this->faker->dateTime(),
        ];
    }
}
