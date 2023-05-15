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
            'Categoria' => 'Entrantes',
            'imagen' => 'default'         
        ]);
        Categorias::create([
            'Categoria' => 'Primeros',
            'imagen' => 'default'         
        ]);

        Categorias::create([
            'Categoria' => 'Segundo',
            'imagen' => 'default'         
        ]);

        Categorias::create([
            'Categoria' => 'Postres',
            'imagen' => 'default'         
        ]);

    }
}
