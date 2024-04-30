<?php

namespace Database\Factories;

use App\Models\ComentarioReview;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComentarioReview>
 */
class ComentarioReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComentarioReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'autor_comentario' => $this->faker->randomNumber(),
            'review_id' => $this->faker->randomNumber(),
            'texto_comentario' => $this->faker->sentence,
        ];
    }
}
