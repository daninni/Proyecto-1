{{-- filepath: resources/views/proyectos/detalle.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle del Proyecto')

@section('content')
    @if($proyecto)
        <h2>Detalle del Proyecto</h2>
        <ul>
            <li><strong>ID:</strong> {{ $proyecto->id }}</li>
            <li><strong>Nombre:</strong> {{ $proyecto->nombre }}</li>
            <li><strong>Fecha de Inicio:</strong> {{ $proyecto->fechaInicio }}</li>
            <li><strong>Estado:</strong> {{ $proyecto->estado }}</li>
            <li><strong>Responsable:</strong> {{ $proyecto->responsable }}</li>
            <li><strong>Monto:</strong> ${{ number_format($proyecto->monto, 0, ',', '.') }}</li>
        </ul>
    @else
        <h2>Proyecto no encontrado</h2>
        <p>No existe un proyecto con ese ID.</p>
    @endif
@endsection