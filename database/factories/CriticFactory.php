<?php

namespace Database\Factories;

use App\Models\Art;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Critic>
 */
class CriticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'from' => $this->faker->name(),
            'art_id' => Art::all()->random()->id,
            'comment' => $this->faker->text(200),
            'rating' => $this->faker->numberBetween(1, 100),
        ];
    }
}
