{{-- filepath: resources/views/proyectos/agregar.blade.php --}}
@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')
    <h2>Proyecto Creado</h2>
    <ul>
        <li><strong>Nombre:</strong> {{ $nuevo->nombre }}</li>
        <li><strong>Fecha de Inicio:</strong> {{ $nuevo->fechaInicio }}</li>
        <li><strong>Estado:</strong> {{ $nuevo->estado }}</li>
        <li><strong>Responsable:</strong> {{ $nuevo->responsable }}</li>
        <li><strong>Monto:</strong> ${{ number_format($nuevo->monto, 0, ',', '.') }}</li>
    </ul>
@endsection