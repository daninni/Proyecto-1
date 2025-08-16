<?php

use App\Http\Controllers\proyectoController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController; 
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Agregar proyecto
Route::post('/agregarProyecto', [proyectoController::class, 'agregarProyecto']); 
// Listar proyectos
Route::get('/listarProyectos', [proyectoController::class, 'listarProyectos']); 
// Obtener proyecto por id
Route::get('/obtenerProyectoId/{id}', [proyectoController::class, 'obtenerProyectoId']); 
//Actualizar proyecto por id
Route::put('/actualizarProyectoId/{id}', [proyectoController::class, 'actualizarProyectoId']); 
//Eliminar proyecto por id
Route::delete('/eliminarProyectoId/{id}', [proyectoController::class, 'eliminarProyectoId']);
// Obtener UF del día
Route::get('/uf-hoy', [proyectoController::class, 'mostrarUf']);

// Registro
Route::post('/registro', [AuthController::class, 'register']);

//Login
Route::post('/login', [AuthController::class, 'login']);

//Ruta protegida 
Route::middleware('jwt.auth')->group(function () {
    Route::get('/proyectos', [proyectoController::class, 'index']);
});