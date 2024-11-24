<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Visita;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index(){
        $pedidos = auth()->user()->cliente->pedidos;

        $pedidos->load('detalles.pizza');
        $pedidos->load('pagoMetodo');
        $pedidos->load('pagoEstado');
        $pedidos->load('pedidoEstado');

        $pedidos->each(function($pedido){
            $pedido->fecha_literal = Carbon::parse($pedido->created_at)->diffForHumans();
        });

        return Inertia::render('Historial/Index',[
            'pedidos' => $pedidos
        ]);
    }
}
