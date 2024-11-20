<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Visita;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $visitas = Visita::where('page_name', 'dashboard')->first();
        return Inertia::render('Dashboard', [
            'visitas' => $visitas
        ]);
    }
}
