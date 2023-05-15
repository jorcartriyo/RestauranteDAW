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
        Articulos::factory(15)->create();
    }
}
