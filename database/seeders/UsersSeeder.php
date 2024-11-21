<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dario = User::create([
            'name' => 'Dario Suarez Lazarte',
            'email' => 'dsuarezlazarte@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        Cliente::create([
            'user_id' => $dario->id,
            'ci_nit' => '1234567',
            'numero_telf' => '1234567',
            'direccion' => 'Calle 123',
        ]);

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
