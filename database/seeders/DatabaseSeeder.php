<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posters');
        Storage::makeDirectory('posters');


        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Tag::factory()->count(8)->create();
        $this->call(ActorActressSeeder::class);
        $this->call(ArtSeeder::class);
    }
}
