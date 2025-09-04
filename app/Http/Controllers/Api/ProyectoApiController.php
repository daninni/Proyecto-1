<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Http\Resources\ProyectoResource;
use Illuminate\Http\Request;

class ProyectoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $proyectos = Proyecto::orderBy('nombre')->get();
                
            // si no hay proyectos registrados
            if ($proyectos->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'data' => [],
                    'message' => 'No hay proyectos registrados.'
                ], 200);
            }

            // respuesta exitosa
            return response()->json([
                'status' => 'success',
                'data' => ProyectoResource::collection($proyectos),
                'message' => 'Lista de proyectos'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al obtener los proyectos',
                'data' => null
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // validamos los datos
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'fecha_inicio' => 'required|date',
                'estado' => 'required|string',
                'responsable' => 'required|string',
                'monto' => 'required|numeric|min:0',
            ]);

            // creacion proyecto
            $proyecto = Proyecto::create([
                ...$validatedData,
                'created_by' => auth('api')->id()
            ]);

            // respuesta exitosa
            return response()->json([
                'status' => 'success',
                'message' => 'Proyecto creado con exito',
                'data' => new ProyectoResource($proyecto)
            ], 201);
        } catch (\Throwable $th) {
            // respuesta error
            return response()->json([
                'status' => 'error',
                'message' => 'No fue posible crear el proyecto',
                'data' => null
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            // busqueda proyecto
            $proyecto = Proyecto::find($id);

            // si no existe manda error
            if (!$proyecto) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'El proyecto no existe',
                    'data' => null
                ], 404);
            }

            // si existe respuesta exitosa
            return response()->json([
                'status' => 'success',
                'message' => 'Proyecto encontrado',
                'data' => new ProyectoResource($proyecto)
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al buscar el proyecto',
                'data' => null
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
