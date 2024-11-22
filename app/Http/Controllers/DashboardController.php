<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Pedido;
use App\Models\Visita;
use Illuminate\Http\Request;
use App\Models\DetallePedido;

class DashboardController extends Controller
{
    public function index()
    {
        $visitas = Visita::where('page_name', request()->path())->first();

        $cantUser = User::count();
        $cantAdmin = User::role('admin')->count();
        $cantCajero = User::role('cajero')->count();
        $cantCliente = User::role('cliente')->count();


        $pizzaMasVendida = DetallePedido::select('pizza_id')
        ->selectRaw('SUM(cantidad) as total_pedidos')
        ->groupBy('pizza_id')
        ->orderByDesc('total_pedidos')
        ->with('pizza') // Carga la relación de pizza
        ->first();


        $pizzaMenosVendida = DetallePedido::select('pizza_id')
        ->selectRaw('SUM(cantidad) as total_pedidos')
        ->groupBy('pizza_id')
        ->orderBy('total_pedidos')
        ->with('pizza') // Carga la relación de pizza
        ->first();

        $totalVentas = Pedido::sum('total');

        $usersByDay= User::selectRaw('DATE (created_at) as day, COUNT(*) as count')
        ->groupBy('day')
        ->pluck('count', 'day');

        $pedidosByDay= Pedido::selectRaw('DATE (created_at) as day, COUNT(*) as count')
        ->groupBy('day')
        ->pluck('count', 'day');


        return Inertia::render('Dashboard', [
            'visitas' => $visitas,
            'cantUser' => $cantUser,
            'cantAdmin' => $cantAdmin,
            'cantCajero' => $cantCajero,
            'cantCliente' => $cantCliente,
            'pizzaMasVendida' => $pizzaMasVendida,
            'pizzaMenosVendida' => $pizzaMenosVendida,
            'totalVentas' => $totalVentas,
            'chartData' => [
                'users' => $usersByDay,
                'pedidos' => $pedidosByDay
            ]
        ]);
    }
}
