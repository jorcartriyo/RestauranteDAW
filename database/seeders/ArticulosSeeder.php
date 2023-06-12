<?php

namespace Database\Seeders;

use App\Models\Articulos;
use Illuminate\Database\Seeder;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articulos::create([
            'nombre' =>  'Menu',
            'categoria' => 5,      
            'precio' => 18,
            'activo' => 1,
            'tipo' => 'menu',
            'recomendado' => 0,
            'imagen' => 'default',
        ]);

        Articulos::factory(15)->create();
    }
}
