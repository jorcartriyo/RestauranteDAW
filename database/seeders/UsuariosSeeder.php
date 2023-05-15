<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              

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
    }
}
