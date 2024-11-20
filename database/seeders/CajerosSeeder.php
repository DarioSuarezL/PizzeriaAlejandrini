<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CajerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Cajero 1',
            'email' => 'cajero1@gmail.com',
            'password' => bcrypt('passwords')
        ])->assignRole('cajero');
        User::create([
            'name' => 'Cajero 2',
            'email' => 'cajero2@gmail.com',
            'password' => bcrypt('passwords')
        ])->assignRole('cajero');
        User::create([
            'name' => 'Cajero 3',
            'email' => 'cajero3@gmail.com',
            'password' => bcrypt('passwords')
        ])->assignRole('cajero');
        User::create([
            'name' => 'Cajero 4',
            'email' => 'cajero4@gmail.com',
            'password' => bcrypt('passwords')
        ])->assignRole('cajero');
    }
}
