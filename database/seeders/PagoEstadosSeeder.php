<?php

namespace Database\Seeders;

use App\Models\PagoEstado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagoEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PagoEstado::create([
            'nombre' => 'Pendiente',
        ]);

        PagoEstado::create([
            'nombre' => 'Aprobado',
        ]);

        PagoEstado::create([
            'nombre' => 'Revertido',
        ]);

        PagoEstado::create([
            'nombre' => 'Cancelado',
        ]);

    }
}
