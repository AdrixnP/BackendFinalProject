<?php
namespace Database\Factories;

use App\Models\TipoValoracion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoValoracionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoValoracion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_val' => $this->faker->randomElement(['buena', 'mala']),
            'imagen_val' => 'public/images/' . $this->faker->randomElement(['buena', 'mala']) . '.png',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
