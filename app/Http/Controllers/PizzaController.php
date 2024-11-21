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
        $pizzas = Pizza::orderBy('id')->get();
        $visitas = Visita::where('page_name', 'pizzas.index')->first();

        return Inertia::render('Pizzas/Index', [
            'pizzas' => $pizzas,
            'visitas' => $visitas
        ]);

    }

    public function create(){
        $categorias = Categoria::all();
        $tamanos = Tamano::all();

        return Inertia::render('Pizzas/Create', [
            'categorias' => $categorias,
            'tamanos' => $tamanos
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'tamano_id' => 'required|exists:tamanos,id',
            'foto' => 'required|image'
        ]);

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

    public function edit(Pizza $pizza){
        $categorias = Categoria::all();
        $tamanos = Tamano::all();

        return Inertia::render('Pizzas/Edit', [
            'pizza' => $pizza,
            'categorias' => $categorias,
            'tamanos' => $tamanos
        ]);
    }

    public function update(Request $request, Pizza $pizza){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|max:255',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'tamano_id' => 'required|exists:tamanos,id',
            'foto' => 'nullable|image'
        ]);
        if($request->foto){
            $imagen_url = cloudinary()->upload($request->foto->getRealPath(),[
                'folder' => 'Pizzeria',
            ])->getSecurePath();

            $pizza->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'categoria_id' => $request->categoria_id,
                'tamano_id' => $request->tamano_id,
                'imagen_url' => $imagen_url
            ]);
        }

        $pizza->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
            'tamano_id' => $request->tamano_id,
        ]);

        return redirect()->route('pizzas.index');
    }

    public function destroy(Pizza $pizza){
        $pizza->delete();
        return redirect()->route('pizzas.index');
    }

}
