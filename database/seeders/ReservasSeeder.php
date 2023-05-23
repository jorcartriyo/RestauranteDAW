<?php

namespace Database\Seeders;

use App\Models\Reservas;
use Illuminate\Database\Seeder;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    { 
        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 1,      
            'comensales' => 3
                    
        ]);

        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 2,      
            'comensales' => 4
                    
        ]);

        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 5,      
            'comensales' => 5
                    
        ]);

        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 6,      
            'comensales' => 8
                    
        ]);


        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 7,      
            'comensales' => 6
                    
        ]);

        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 8,      
            'comensales' =>10
                    
        ]);

        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 9,      
            'comensales' => 5
                    
        ]);

        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 10,      
            'comensales' => 4
                    
        ]);

        Reservas::create([
            'nombre' => 'Paco',
            'email' => 'paco@gmail.com',        
            'telefono' => '658956425',  
            'fecha_reserva' => '2023-08-12 15:30',
            'mesa' => 11,      
            'comensales' => 7
                    
        ]);
       
      
    }
}
