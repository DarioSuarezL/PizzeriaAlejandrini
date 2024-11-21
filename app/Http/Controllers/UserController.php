<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Visita;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id')->get();
        $visitas = Visita::where('page_name', 'users.index')->first();

        return Inertia::render('Users/Index',[
            'users' => $users,
            'visitas' => $visitas
        ]);
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index');
    }
}
