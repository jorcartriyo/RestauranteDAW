<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorias::create([
            'categoria' => '1Entrantes',
            'imagen' => 'default'         
        ]);
        Categorias::create([
            'categoria' => '2Primeros',
            'imagen' => 'default'         
        ]);

        Categorias::create([
            'categoria' => '3Segundo',
            'imagen' => 'default'         
        ]);

        Categorias::create([
            'categoria' => '4Postres',
            'imagen' => 'default'         
        ]);
        Categorias::create([
            'categoria' => '5Precios',
            'imagen' => 'default'         
        ]);

    }
}
