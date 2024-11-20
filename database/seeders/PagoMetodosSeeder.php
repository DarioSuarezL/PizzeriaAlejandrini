<?php

namespace Database\Seeders;

use App\Models\PagoMetodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagoMetodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PagoMetodo::create([
            'nombre' => 'Efectivo',
        ]);

        PagoMetodo::create([
            'nombre' => 'Tarjeta de crédito/debito',
        ]);

        PagoMetodo::create([
            'nombre' => 'Tigo Money',
        ]);

        PagoMetodo::create([
            'nombre' => 'Transferencia QR',
        ]);
    }
}
