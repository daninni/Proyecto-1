<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    public function run(): void
    {
        Proyecto::create([ 
            'nombre' => 'Sistema Inventario',
            'fechaInicio' => '2025-06-01', 
            'estado' => 'En progreso',
            'responsable' => 'Ana Torres',
            'monto' => 1500000,
            'created_by' => 1, 
        ]);

        Proyecto::create([ 
            'nombre' => 'Rediseño Web',
            'fechaInicio' => '2025-07-01',
            'estado' => 'Pendiente',
            'responsable' => 'Carlos Ruiz',
            'monto' => 950000,
            'created_by' => 2, 
        ]);

    }
}