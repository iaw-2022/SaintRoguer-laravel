<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ])->assignRole('admin');

        User::create([
            'name' => 'Critic',
            'email' => 'critic@gmail.com',
            'password' => bcrypt('critic')
        ])->assignRole('critic');

        User::create([
            'name' => 'agent',
            'email' => 'agent@gmail.com',
            'password' => bcrypt('agent')
        ])->assignRole('talent-agent');

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user')
        ]);

        User::factory(11)->create();
    }
}
