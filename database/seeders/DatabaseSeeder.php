<?php

namespace Database\Seeders;

use App\Models\User;
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



        User::create([
            'name' => 'jorcartriyo',
            'email' => 'jorcartriyo@gmail.com',
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
    }
}
