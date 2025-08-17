<?php

use App\Http\Controllers\proyectoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registro', function () {
    return view('registro');
});


Route::get('/listar', function () {
    $proyectos = \App\Models\Proyecto::all();
    return view('proyectos.listar', compact('proyectos'));
});
