<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Pizza;
use App\Models\Visita;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = Pizza::all();
        $visitas = Visita::where('page_name', 'pizzas.index')->first();

        return Inertia::render('Pizzas/Index', [
            'pizzas' => $pizzas,
            'visitas' => $visitas
        ]);

    }
}
