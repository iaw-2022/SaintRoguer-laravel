<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Art;
use App\Models\Image;
use App\Models\Critic;
use Faker\Generator;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        $Arts = Art::factory()->count(50)->create();

        foreach ($Arts as $Art) {
            Image::factory(1)->create([
                'imageable_id' => $Art->id,
                'imageable_type' => Art::class
            ]);
            Critic::factory()->count(1)->create([
                'art_id' => $Art->id,
            ]);
            $Art->tags()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
            $Art->actor_actresses()->attach([
                rand(1, 10) => ['role' => ($faker->word)],
                rand(11, 20) => ['role' => ($faker->word)],
                rand(21, 30) => ['role' => ($faker->word)],
                rand(31, 40) => ['role' => ($faker->word)],
                rand(41, 50) => ['role' => ($faker->word)],
                rand(51, 60) => ['role' => ($faker->word)],
                rand(61, 70) => ['role' => ($faker->word)],
                rand(71, 80) => ['role' => ($faker->word)],
                rand(81, 90) => ['role' => ($faker->word)],
                rand(91, 100) => ['role' => ($faker->word)],
                rand(101, 110) => ['role' => ($faker->word)],
                rand(111, 120) => ['role' => ($faker->word)],
                rand(121, 130) => ['role' => ($faker->word)],
                rand(131, 140) => ['role' => ($faker->word)],
                rand(141, 150) => ['role' => ($faker->word)],
            ]);
        }
    }
}
