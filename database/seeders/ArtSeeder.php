<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Art;
use App\Models\Image;
use App\Models\Critic;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Arts = Art::factory()->count(50)->create();

        foreach ($Arts as $Art) {
            /* Image::factory(1)->create([
                'imageable_id' => $Art->id,
                'imageable_type' => Art::class
            ]);*/
            Critic::factory()->count(1)->create([
                'art_id' => $Art->id,
            ]);
            $Art->tags()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
            $Art->actor_actresses()->attach([
                rand(1, 10),
                rand(11, 20),
                rand(21, 30),
                rand(31, 40),
                rand(41, 50),
                rand(51, 60),
                rand(61, 70),
                rand(71, 80),
                rand(81, 90),
                rand(91, 100),
                rand(101, 110),
                rand(111, 120),
                rand(121, 130),
                rand(131, 140),
                rand(141, 150),
            ]);
        }
    }
}
