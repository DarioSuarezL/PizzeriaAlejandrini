<?php

namespace Database\Seeders;

use App\Models\Pizza;
use App\Models\Tamano;
use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $premium = Categoria::create(['nombre' => 'Premium']);
        $normal = Categoria::create(['nombre' => 'Normal']);

        $pequeña = Tamano::create(['nombre' => 'Pequeña']);
        $grande = Tamano::create(['nombre' => 'Grande']);


        /*
            CATEGORIA PREMIUM
        */


        Pizza::create([
            'nombre' => 'CHESSEBURGER',
            'precio' => 56.00,
            'imagen_url' => "https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Pizzeria/ChesseBurguer_w5hfyt.jpg",
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);


        Pizza::create([
            'nombre' => 'CHESSEBURGER',
            'precio' => 32.00,
            'imagen_url' => "https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Pizzeria/ChesseBurguer_w5hfyt.jpg",
            'descripcion' => 'CARNE MOLIDA, TOCINO Y CHEDDAR.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS',
            'precio' => 56.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/CuatroQuesos_guachl.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '4 QUESOS',
            'precio' => 32.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/CuatroQuesos_guachl.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR, REQUESÓN Y ROQUEFORT.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF',
            'precio' => 54.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Strogonoff_aet15x.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'STROGONOFF',
            'precio' => 30.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Strogonoff_aet15x.jpg',
            'descripcion' => 'POLLO, JAMÓN, PAPAS FRITAS Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA',
            'precio' => 54.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Carnivora_fkdn1k.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'CARNIVORA',
            'precio' => 30.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Carnivora_fkdn1k.jpg',
            'descripcion' => 'CARNE MOLIDA, JAMÓN, CHOCLO Y CHEDDAR.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL',
            'precio' => 52.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/Pernil_oapxf1.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => 'PERNIL',
            'precio' => 28.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101685/Pernil_oapxf1.jpg',
            'descripcion' => 'PERNIL DE CERDO, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS',
            'precio' => 50.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/TresQuesos_ona1hf.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano_id' => $grande->id,
            'categoria_id' => $premium->id
        ]);

        Pizza::create([
            'nombre' => '3 QUESOS',
            'precio' => 28.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/TresQuesos_ona1hf.jpg',
            'descripcion' => 'MOZZARELLA, CHEDDAR Y REQUESÓN.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $premium->id
        ]);


       /*
            CATEGORIA NORMAL
        */


        Pizza::create([
            'nombre' => 'CALABRESA',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Calabresa_ow4yvl.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'CALABRESA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101682/Calabresa_ow4yvl.jpg',
            'descripcion' => 'CALABRESA, MOZZARELLA, CHOCLO O ACEITUNAS.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Americana_gcr3xy.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'AMERICANA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Americana_gcr3xy.jpg',
            'descripcion' => 'HUEVO, TOCINO Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Peperoni_ahvta0.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'PEPERONI',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101686/Peperoni_ahvta0.jpg',
            'descripcion' => 'PEPERONI Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA',
            'precio' => 48.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Vegetariana_wmjio1.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'VEGETARIANA',
            'precio' => 26.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101687/Vegetariana_wmjio1.jpg',
            'descripcion' => 'TOMATE, CHAMPIÑONES, PIMENTÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA',
            'precio' => 46.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Hawaiana_tct2sz.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'HAWAIANA',
            'precio' => 24.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Hawaiana_tct2sz.jpg',
            'descripcion' => 'JAMÓN, PIÑA Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA',
            'precio' => 44.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Clasica_zlmovf.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'CLÁSICA',
            'precio' => 24.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Clasica_zlmovf.jpg',
            'descripcion' => 'JAMÓN, CHOCLO Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA',
            'precio' => 40.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Margarita_e5usaj.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'MARGARITA',
            'precio' => 22.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101683/Margarita_e5usaj.jpg',
            'descripcion' => 'TOMATE Y MOZZARELLA.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA',
            'precio' => 38.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101684/Economica_noy7za.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano_id' => $grande->id,
            'categoria_id' => $normal->id
        ]);

        Pizza::create([
            'nombre' => 'ECONÓMICA',
            'precio' => 22.00,
            'imagen_url' => 'https://res.cloudinary.com/dt0pbqivj/image/upload/v1702101684/Economica_noy7za.jpg',
            'descripcion' => 'MOZZARELLA Y ORÉGANO.',
            'tamano_id' => $pequeña->id,
            'categoria_id' => $normal->id
        ]);


    }
}
