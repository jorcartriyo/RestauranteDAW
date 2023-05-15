<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eventos;


class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eventos::create([
            'titulo' => 'Meú Navideño',
            'descripcionCorta' => 'Precio: 50€ (Menú especial de navidad y música en directo)',
            'descripcion' => 'Contamos con Pierna de Cerdo al Horno, Mixiote Navideño, Lomo de Cerdo al Horno Navideño, Tradición Navideña: Romeritos con Camarón, Queso Relleno, Pozole Navideño, Pavo navideño ahumado de uva, Pavo glaseado con mandarina.',
            'dia' => 24,
            'mes' => 'Diciembre',
            'imagen' => 'default'         
        ]);

    
        Eventos::create([
            'titulo' => 'Menú Fin de Año',
            'descripcionCorta' => 'Precio: 80€ (Menú especial de fin de año y música en directo con artistas exclusivos)',            
            'descripcion' => 'Contamos con los siguientes platos Cabrito Guisado, Solomillo Wellington, Gambones a la Plancha, Ostras Naturales, Bacalao con pisto de verduras, Ceviche de caballa, Mejillones en salsa picante, Mousse de chocolate.',
            'dia' => 31,
            'mes' => 'Diciembre',
            'imagen' => 'default'         
        ]);

        Eventos::create([
            'titulo' => 'Menú Carnavalero',
            'descripcionCorta' => 'Precio: 40€ (Menú especial de carnaval con disfraces y sorpresas)',        
            'descripcion' => 'Ceviche Mixto, Ceviche de Pescado, Ceviche Camarón, Plancha de Mariscos, Cócteles.',
            'dia' => 28,
            'mes' => 'Febrero',
            'imagen' => 'default'         
        ]);

    }
}
