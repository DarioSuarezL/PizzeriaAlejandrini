<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Pizza;
use App\Models\Tamano;
use App\Models\Visita;
use App\Models\Categoria;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

    public function create(){
        $categorias = Categoria::all();
        $tamanos = Tamano::all();

        // dd($categorias, $tamanos);
        return Inertia::render('Pizzas/Create', [
            'categorias' => $categorias,
            'tamanos' => $tamanos
        ]);
    }

    public function store(Request $request){
        // dd($request->foto);
        $imagen_url = cloudinary()->upload($request->foto->getRealPath(),[
            'folder' => 'Pizzeria',
        ])->getSecurePath();
        Pizza::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
            'tamano_id' => $request->tamano_id,
            'imagen_url' => $imagen_url
        ]);
        return redirect()->route('pizzas.index');
    }

}
