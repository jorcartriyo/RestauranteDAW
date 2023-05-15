<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulos>
 */
class ArticulosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $articulos=[
        'Calamares Fritos','Anchoas en Escabeche','Tarta de arandanos','Fritura de pescado',
        'Carne con ajos', 'Ensalada de la casa ','Creppes con helado de chocolate','Sopa de marisco',
        'Pollo con patatas y salsa parmesana','Revuelto de ajos tiernos','Espaguetti con setas', 'Leche Frita',
        'Tortilla Sacromonte', 'Revuelto de ajetes tiernos con gulas', 'Ensalada Cesar'
    ];
    public function definition(): array
    {
        return [
            'nombre' =>  fake()->unique()->randomElement($this->articulos),
            'categoria' => fake()->randomElement([1,2,3,4]),
            'descripcion' => fake()->text(),
            'precio' => fake()->randomFloat('10',0,200),
            'activo' => fake()->randomElement([0,1]),
            'tipo' => fake()->randomElement(['carta', 'menu', 'cartamenu']),
            'recomendado' => fake()->randomElement([0,1]),
            'imagen' => 'default',

        ];
    }
}
