<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActorActress;
use App\Models\Image;


class ActorActressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Artists = ActorActress::factory()->count(150)->create();
        foreach ($Artists as $Artist) {
            $image = Image::factory(1)->faceImage();
            $Artist->Image()->create([
                'image_content' => $image["image_content"],
                'extension' => $image["extension"]
            ]);
        }

    }
}
