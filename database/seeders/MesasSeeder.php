<?php

namespace Database\Seeders;

use App\Models\Mesas;
use Illuminate\Database\Seeder;

class MesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mesas::create([
            'nombre' => 'Mesa 1',
            'comensales' => 6
        ]);
        Mesas::create([
            'nombre' => 'Mesa 2',
            'comensales' => 4       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 3',
            'comensales' => 2      
        ]);
        Mesas::create([
            'nombre' => 'Mesa 4',
            'comensales' => 8       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 5',
            'comensales' => 10       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 6',
            'comensales' => 10       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 7',
            'comensales' => 4       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 8',
            'comensales' => 4       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 9',
            'comensales' => 2    
        ]);
        Mesas::create([
            'nombre' => 'Mesa 10',
            'comensales' => 6       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 11',
            'comensales' => 8       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 12',
            'comensales' => 4       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 13',
            'comensales' => 4       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 14',
            'comensales' => 2      
        ]);
        Mesas::create([
            'nombre' => 'Mesa 15',
            'comensales' => 6       
        ]);
        Mesas::create([
            'nombre' => 'Mesa 16',
            'comensales' => 2       
        ]);
   


    }
}
