<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 

class UsuarioSeeder extends Seeder  
{
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Ana Torres',
            'correo' => 'ana@123.com',
            'clave' => Hash::make('ana123'), 
        ]);

        Usuario::create([
            'nombre' => 'Carlos Ruiz',
            'correo' => 'carlos@123.com',
            'clave' => Hash::make('carlos123'), 
        ]);
    }
}