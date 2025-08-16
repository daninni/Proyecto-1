<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Services\UfService;

class proyectoController extends Controller
{
    // Ejemplos estáticos
    private function proyectosEjemplo()
    {
        $p1 = new Proyecto();
        $p1->id = 1;
        $p1->nombre = 'Sistema Inventario';
        $p1->fechaInicio = '2025-06-01';
        $p1->estado = 'En progreso';
        $p1->responsable = 'Ana Torres';
        $p1->monto = 1500000;

        $p2 = new Proyecto();
        $p2->id = 2;
        $p2->nombre = 'Rediseño Web';
        $p2->fechaInicio = '2025-07-01';
        $p2->estado = 'Pendiente';
        $p2->responsable = 'Carlos Ruiz';
        $p2->monto = 950000;

        return [$p1, $p2];
    }

    // Agregar proyecto
    public function agregarProyecto(Request $request)
    {
        // Forma 1: datos estaticos
        $nuevo = new Proyecto();
        $nuevo->id = 3;
        $nuevo->nombre = 'Proyecto Web';
        $nuevo->fechaInicio = '2025-07-01';
        $nuevo->estado = 'En progreso';
        $nuevo->responsable = 'Maria Lopez';
        $nuevo->monto = 1200000;

        // Forma 2: usando datos request 
        /*
        $nuevo = new Proyecto();
        $nuevo->id = 3; // 
        $nuevo->nombre = $request->nombre;
        $nuevo->fechaInicio = $request->fechaInicio;
        $nuevo->estado = $request->estado;
        $nuevo->responsable = $request->responsable;
        $nuevo->monto = $request->monto;
        */

        return view('proyectos.agregar', compact('nuevo'));
    }

    // Listar proyectos
    public function listarProyectos()
    {
        $proyectos = $this->proyectosEjemplo();
        return view('proyectos.listar', compact('proyectos'));
    }

    // Obtener proyecto por id
    public function obtenerProyectoId($id)
    {
        $proyecto = collect($this->proyectosEjemplo())->firstWhere('id', $id);
        return view('proyectos.detalle', compact('proyecto'));
    }

    // Actualizar proyecto por id
    public function actualizarProyectoId(Request $request, $id)
    {
        // Simulación: solo mensaje y datos recibidos
        $datos = $request->all();
        return view('proyectos.actualizar', compact('id', 'datos'));
    }

    // Eliminar proyecto por id
    public function eliminarProyectoId($id)
    {
        // Simulación: solo mensaje
        return view('proyectos.eliminar', compact('id'));
    }

    public function mostrarUf(UfService $ufService)
    {
        $valorUf = $ufService->getUfHoy();
        return response()->json([$valorUf -> uf]);
    }
}
