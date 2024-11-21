<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Visita;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $users = User::role('cliente')->get()->map(function($user){
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'cliente' => $user->cliente,
            ];
        });
        $visitas = Visita::where('page_name', request()->path())->first();
        return Inertia::render('Clientes/Index',[
            'users' => $users,
            'visitas' => $visitas
        ]);
    }
}
