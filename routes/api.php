<?php

use App\Http\Controllers\proyectoController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProyectoApiController;

// rutas publicas sin jwt
Route::post('/registro', [AuthController::class, 'registro']);
Route::post('/login', [AuthController::class, 'login']);

// listar proyectos sin jwt
Route::get('/listarProyectos', [proyectoController::class, 'listarProyectos']); 
Route::get('/proyectos', [proyectoController::class, 'index']);

// rutas protegidas con jwt
Route::middleware(['jwt'])->group(function () {
    Route::apiResource('proyectos', \App\Http\Controllers\Api\ProyectoApiController::class);
    Route::get('/uf-hoy', [proyectoController::class, 'mostrarUf']);
    
    // usuario autenticado jwt
    Route::get('/user', function () {
        return response()->json(['usuario' => auth('api')->user()]);
    });
});