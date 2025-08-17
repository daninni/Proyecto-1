<?php

use App\Http\Controllers\proyectoController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// rutas publicas sin jwt
Route::post('/registro', [AuthController::class, 'registro']);
Route::post('/login', [AuthController::class, 'login']);

// listar proyectos sin jwt
Route::get('/listarProyectos', [proyectoController::class, 'listarProyectos']); 
Route::get('/proyectos', [proyectoController::class, 'index']);

// rutas protegidas con jwt
Route::middleware(['jwt'])->group(function () {
    Route::post('/agregarProyecto', [proyectoController::class, 'agregarProyecto']); 
    Route::get('/obtenerProyectoId/{id}', [proyectoController::class, 'obtenerProyectoId']); 
    Route::put('/actualizarProyectoId/{id}', [proyectoController::class, 'actualizarProyectoId']); 
    Route::delete('/eliminarProyectoId/{id}', [proyectoController::class, 'eliminarProyectoId']);
    Route::get('/uf-hoy', [proyectoController::class, 'mostrarUf']);
    
    // usuario autenticado jwt
    Route::get('/user', function () {
        return response()->json(['usuario' => auth('api')->user()]);
    });
});