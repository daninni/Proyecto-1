{{-- filepath: resources/views/proyectos/listar.blade.php --}}
@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')
    <h2>Lista de Proyectos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->nombre }}</td>
                    <td>{{ $proyecto->estado }}</td>
                    <td>{{ $proyecto->responsable }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/api/agregarProyecto') }}" class="btn btn-success">Crear Proyecto</a>
@endsection