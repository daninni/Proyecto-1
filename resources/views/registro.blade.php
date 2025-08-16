<!-- resources/views/registro.blade.php -->
@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<h2>Registro</h2>

<form class="mt-3" id="form-registro">
    <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" required>
    </div>
    <div class="mb-3">
    <label class="form-label">Correo</label>
    <input type="email" class="form-control" name="correo" required>
    </div>
    <div class="mb-3">
    <label class="form-label">Clave</label>
    <input type="password" class="form-control" name="clave" required minlength="6">
    </div>
    <button class="btn btn-primary">Registrarme</button>
</form>

<pre class="mt-4" id="out"></pre>

<script>
    document.getElementById('form-registro').addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = e.target;
    const body = {
        nombre: form.nombre.value,
        correo: form.correo.value,
        clave: form.clave.value
    };
    const res = await fetch('/api/registro', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(body)
    });
    document.getElementById('out').textContent = JSON.stringify(await res.json(), null, 2);
    });
</script>
@endsection