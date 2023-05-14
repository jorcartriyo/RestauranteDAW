<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categorias;
use App\Models\Eventos;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
      

       $usuario1 = User::create([
            'name' => 'jorcartriyo',
            'email' => 'jorcartriyo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'imagen' => 'default'
        ]);
        
       $usuario2 = User::create([
            'name' => 'paco',
            'email' => 'paco@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'imagen' => 'default'
        ]);

        $usuario3 = User::create([
            'name' => 'manolo',
            'email' => 'manolo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678), // password
            'remember_token' => Str::random(10),
            'imagen' => 'default'
        ]);

        User::factory(10)->create();
        $usuarios = User::all();        
        foreach ($usuarios as $usuario) {
            $usuario->assignRole('User');
        }
        $usuario1->assignRole('SuperAdmin');
        $usuario2->assignRole('Admin');
        $usuario3->assignRole('User');

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

   
        Eventos::create([
            'titulo' => 'Combo Navideño',
            'descripcionCorta' => 'Costo: 100 USD (Hospedaje por Tres Días + Bebidas Especiales)',
            'descripcion' => 'Contamos con Pierna de Cerdo al Horno, Mixiote Navideño,Tamales,Lomo de Cerdo al Horno Navideño, Tradición Navideña: Romeritos con Camarón, Queso Relleno, Pozole Navideño, Pavo navideño ahumado de uva, Pavo glaseado con mandarina, Pierna Navideña Enchilada.',
            'dia' => 24,
            'mes' => 'Diciembre',
            'imagen' => 'default'         
        ]);

    
        Eventos::create([
            'titulo' => 'Combo Fin de Año',
            'descripcionCorta' => 'USD 200 (Hospedaje por 5 Días + Artista Exclusivos + Bebidas Especiales)
            ',
            'descripcion' => 'Contamos con los siguientes platos Cabrito Guisado, Solomillo Wellington, Gambones a la Plancha, Ostras Naturales, Bacalao con pisto de verduras, Ceviche de caballa, Mejillones en salsa picante, Mousse de chocolate.',
            'dia' => 31,
            'mes' => 'Diciembre',
            'imagen' => 'default'         
        ]);

        Eventos::create([
            'titulo' => 'Combo Carnavalero',
            'descripcionCorta' => 'USD 80 (Hospedaje por 2 Días con Piscina para Grandes y Pequeños + Eventos + Bebidas )
            ',
            'descripcion' => 'Ceviche Mixto, Plato Arrecho, Plato Picante, Ceviche de Pescado, Ceviche Camarón, Plancha de Mariscos, Cócteles.',
            'dia' => 28,
            'mes' => 'Febrero',
            'imagen' => 'default'         
        ]);


        
        $this->call(ArticulosSeeder::class);

    }
}
