<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Cliente1',
            'email' => 'cliente1@correo.com',
            'password' => bcrypt('password'),
            'is_cliente' => true,
        ])->assignRole('cliente');

        Cliente::create([
            'ci_nit' => '12345678',
            'user_id' => $user1->id,
            'numero_telf' => '12345678',
            'direccion' => 'Calle 1'
        ]);

        $user2 = User::create([
            'name' => 'Cliente2',
            'email' => 'cliente2@correo.com',
            'password' => bcrypt('password'),
            'is_cliente' => true,
        ])->assignRole('cliente');

        Cliente::create([
            'ci_nit' => '12345678',
            'user_id' => $user2->id,
            'numero_telf' => '12345678',
            'direccion' => 'Calle 2'
        ]);
    }
}
