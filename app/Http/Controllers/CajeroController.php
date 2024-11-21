<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Visita;
use Illuminate\Http\Request;

class CajeroController extends Controller
{
    public function index(){
        $users = User::role('cajero')->get();
        $visitas = Visita::where('page_name', request()->path())->first();
        return Inertia::render('Cajeros/Index',[
            'users' => $users,
            'visitas' => $visitas
        ]);
    }
}
