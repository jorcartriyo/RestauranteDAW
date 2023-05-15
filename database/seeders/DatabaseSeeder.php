<?php

namespace Database\Seeders;

use App\Models\Eventos;
use Illuminate\Database\Seeder;


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
        $this->call(UsuariosSeeder::class); 
        $this->call(CategoriasSeeder::class); 
        $this->call(ArticulosSeeder::class);
        $this->call(EventosSeeder::class);
        $this->call(FotosSeeder::class);

    }
}
