<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dario Suarez Lazarte',
            'email' => 'dsuarezlazarte@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        // User::create([
        //     'name' => 'Dario Suarez Lazarte',
        //     'email' => 'dsuarezlazarte@gmail.com',
        //     'password' => bcrypt('password'),
        // ])->assignRole('admin');

        // User::create([
        //     'name' => 'Dario Suarez Lazarte',
        //     'email' => 'dsuarezlazarte@gmail.com',
        //     'password' => bcrypt('password'),
        // ])->assignRole('admin');
    }
}
