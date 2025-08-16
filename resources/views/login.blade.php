@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <div id="message" class="mb-3"></div>
                    
                    <form id="form-login">
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Clave</label>
                            <input type="password" class="form-control" name="clave" required>
                        </div>
                        <button class="btn btn-success w-100">Iniciar sesión</button>
                    </form>
                    
                    <div class="mt-4">
                        <h6>Respuesta del servidor:</h6>
                        <pre class="bg-light p-3 rounded" id="out" style="max-height: 200px; overflow-y: auto;"></pre>
                    </div>
                    
                    <div class="text-center mt-3">
                        <p>¿No tienes cuenta? <a href="/registro" class="btn btn-outline-primary btn-sm">Registrarse</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('form-login').addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = e.target;
    const body = { correo: form.correo.value, clave: form.clave.value };
    
    // Mostrar mensaje de carga
    document.getElementById('message').innerHTML = '<div class="alert alert-info">Iniciando sesión...</div>';
    
    try {
        const res = await fetch('/api/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(body)
        });
        
        const data = await res.json();
        document.getElementById('out').textContent = JSON.stringify(data, null, 2);
        
        const messageDiv = document.getElementById('message');
        
        if (data.token) {
            localStorage.setItem('token', data.token);
            messageDiv.innerHTML = '<div class="alert alert-success">¡Login exitoso! Token guardado en localStorage.</div>';
            
            // redirigir 
            setTimeout(() => {
                window.location.href = '/listar';
            }, 2000);
        } else {
            messageDiv.innerHTML = '<div class="alert alert-danger">Error: ' + (data.message || 'Credenciales incorrectas') + '</div>';
        }
    } catch (error) {
        document.getElementById('message').innerHTML = '<div class="alert alert-danger">Error de conexión: ' + error.message + '</div>';
        document.getElementById('out').textContent = 'Error: ' + error.message;
    }
});
</script>
@endsection