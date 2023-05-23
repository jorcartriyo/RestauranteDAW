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
            'categoria' => 'Entrantes',
            'imagen' => 'default'         
        ]);
        Categorias::create([
            'categoria' => 'Primeros',
            'imagen' => 'default'         
        ]);

        Categorias::create([
            'categoria' => 'Segundo',
            'imagen' => 'default'         
        ]);

        Categorias::create([
            'categoria' => 'Postres',
            'imagen' => 'default'         
        ]);

    }
}
