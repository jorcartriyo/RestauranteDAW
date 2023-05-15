<?php

namespace Database\Seeders;

use App\Models\Fotos;
use Illuminate\Database\Seeder;

class FotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
       
        Fotos::create([
            'seccion' => 'menu',
            'texto1' => 'Como en',        
            'texto2' => 'tu Propia',  
            'texto3' => 'Casa',
            'imagen' => 'menu3.jpg',                 
        ]);
       
        Fotos::create([
            'seccion' => 'inicio',
            'texto1' => 'La Mejor',       
            'texto2' => 'Ubicación',  
            'imagen' => 'inicio1.jpg',                 
        ]);
        Fotos::create([
            'seccion' => 'inicio',
            'texto1' => 'Los Mejores Platos',        
            'texto2' => 'Productos',  
            'texto3' => 'Aquí!', 
            'imagen' => 'inicio2.jpg',                 
        ]);
       
        Fotos::create([
            'seccion' => 'inicio',
            'texto1' => 'Gracias por',        
            'texto2' => 'Elegirnos',  
            'imagen' => 'inicio3.jpg',                 
        ]);
       
        Fotos::create([
            'seccion' => 'carta',
            'texto1' => 'Los Mejores',        
            'texto2' => 'Productos',  
            'imagen' => 'carta1.jpg',                 
        ]);
        Fotos::create([
            'seccion' => 'carta',
            'texto1' => 'Una Experiencia',        
            'texto2' => 'Jamás',  
            'texto3' => 'Vivida',  
            'imagen' => 'carta2.jpg',                 
        ]);
       
        Fotos::create([
            'seccion' => 'carta',
            'texto1' => 'Sabemos',        
            'texto2' => 'que te Encantará',  
            'imagen' => 'carta3.jpg',                 
        ]);

        Fotos::create([
            'seccion' => 'menu',
            'texto1' => 'Menús',        
            'texto2' => 'Diferentes cada',  
            'texto3' => 'Día!',  
            'imagen' => 'menu1.jpg',                 
        ]);
        Fotos::create([
            'seccion' => 'menu',
            'texto1' => 'La Mejor',        
            'texto2' => 'Calidad',  
            'texto3' => 'Precio',  
            'imagen' => 'menu2.jpg',                 
        ]);
    }
}
