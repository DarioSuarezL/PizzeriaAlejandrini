<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index(){
        $visitas = Visita::where('page_name', request()->path())->first();



        return Inertia::render('Historial/Index',[
            'visitas' => $visitas
        ]);
    }
}
