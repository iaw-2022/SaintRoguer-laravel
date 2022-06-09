<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Art;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Art>
 */
class ArtFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Art::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $title = $this->faker->unique()->sentence(5);
        return [
            'imdb_id' => $this->faker->unique()->randomNumber(7),
            'title' => $title,
            'slug' => Str::slug($title),
            'type' => $this->faker->randomElement(['movie', 'series']),
            'year' => $this->faker->randomNumber(4),
            'releaseDate' => $this->faker->date(),
            'duration' => $this->faker->numberBetween(1, 350),
            'plot' => $this->faker->text(),
            'userRating' => $this->faker->randomNumber(1),
            'imdbRating' => $this->faker->randomNumber(1),
            'director' => $this->faker->name(),
            'videoLink' => $this->faker->url(),
        ];
    }
}
