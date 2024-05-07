<?php
namespace Database\Factories;

use App\Models\Juego;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuegoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Juego::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'nombre_juego' => $this->faker->name,
            'valoracion_juego' => $this->faker->numberBetween(0, 100),
            'descripcion_juego' => $this->faker->paragraph,
            'portada_juego' => $this->faker->imageUrl(540, 960),
            'fechasalida_juego' => $this->faker->dateTimeThisYear,
            'desarrollador_juego' => $this->faker->company,
            'genero_juego' => $this->faker->randomNumber(),
            'link_compra_juego' => $this->faker->url,
        ];
    }
}
