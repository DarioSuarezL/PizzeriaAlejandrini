<?php

namespace Database\Seeders;

use App\Models\PedidoEstado;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PedidoEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PedidoEstado::create(['nombre' => 'En el carrito']);
        PedidoEstado::create(['nombre' => 'En espera del pago']);
        PedidoEstado::create(['nombre' => 'Enviado']);
        PedidoEstado::create(['nombre' => 'Entregado']);
    }
}
