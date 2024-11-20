<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            UsersSeeder::class,
            ClientesSeeder::class,
            CajerosSeeder::class,
            MenuSeeder::class,
            PagoMetodosSeeder::class,
            PagoEstadosSeeder::class,
        ]);
    }
}
