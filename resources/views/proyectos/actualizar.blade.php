{{-- filepath: resources/views/proyectos/actualizar.blade.php --}}
@extends('layouts.app')

@section('title', 'Actualizar Proyecto')

@section('content')
    <h2>Proyecto Actualizado (Simulado)</h2>
    <p>Proyecto con ID: <strong>{{ $id }}</strong> actualizado con los siguientes datos:</p>
    <ul>
        @foreach($datos as $key => $valor)
            <li><strong>{{ ucfirst($key) }}:</strong> {{ $valor }}</li>
        @endforeach
    </ul>
    <a href="{{ url('/listarProyectos') }}" class="btn btn-primary">Volver a la lista</a>
@endsection