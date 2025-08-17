<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto Unidad 2

Este proyecto es una aplicación Laravel que gestiona proyectos y consulta el valor de la UF del día.
Contiene registro de usuarios, login y algunos endpoints privados protegidos por un token jwt

Versiones utilizadas
```sh
node: v18
php: 8.2.28
Apache: 2.4.54
Laravel: 11.31
```

## Creado con composer
   ```sh
   composer create-project laravel/laravel %s "^11.0"
   ```
## Instalación

1. Clona el repositorio y entra al directorio del proyecto.
2. Instala las dependencias:
   ```sh
   composer install
   ```
3. Copiar el archivo de entorno:
   ```sh
   cp .env.example .env
   ```
4. Genera la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```
5. Ejecuta las migraciones:
   ```sh
   php artisan migrate
   ```
6. Pobla la base de datos con seeders:
   ```sh
   php artisan db:seed
   ```
7. Inicia el servidor de desarrollo:
   ```sh
   php artisan serve
   ```

## Endpoints API

Las rutas API están disponibles bajo el prefijo `/api`. Ejemplo de uso con la URL base `http://proyecto-unidad-1.test`:

- **Listar proyectos:**  
  `GET /api/listarProyectos`

- **Agregar proyecto:**  
  `POST /api/agregarProyecto`

- **Obtener proyecto por ID:**  
  `GET /api/obtenerProyectoId/{id}`

- **Actualizar proyecto por ID:**  
  `PUT /api/actualizarProyectoId/{id}`

- **Eliminar proyecto por ID:**  
  `DELETE /api/eliminarProyectoId/{id}`

- **Obtener UF del día:**  
  `GET /api/uf-hoy`

- **Obtener UF del día:**  
  `POST /api/login`

- **Obtener UF del día:**  
  `POST /api/registro`
  
## Ejemplo de petición

```sh
curl http://proyecto-unidad-1.test/api/listarProyectos
```

```sh
curl --location 'http://proyecto-unidad-1.test/api/login' \
--header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzU1NDY1MjM4LCJleHAiOjE3NTU0Njg4MzgsIm5iZiI6MTc1NTQ2NTIzOCwianRpIjoieDJLSzE1SHZRcm9IUERmYSIsInN1YiI6IjEiLCJwcnYiOiI1ODcwODYzZDRhNjJkNzkxNDQzZmFmOTM2ZmMzNjgwMzFkMTEwYzRmIn0.SJhPRq_q2lr5FYgY94T7Go_hf5YAWR7Pe2d7XL0MePk' \
--header 'Content-Type: application/json' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6Iko0SGU1YnhWOGdWV3F1SWhjaWl4a0E9PSIsInZhbHVlIjoiK0h3ZEhEemdxdlRNQ0pWbDdOUDIrREszTWpJTUFEK1ptdkNmVnU2ejc4bTJBOU9mTGRKYVhGem5SVVN6QzVINjM2ZzdkMmV4c2UvMjNSQ2VvaDMrcFpWcHRmenRFQW9rYUZjT1ljUnhYajlKKzY0UDBKZXFIL0FUOVFabUZ3bE4iLCJtYWMiOiIwOTdkODJiNGM2NDNhNDBlMmYwMjU0MDU1MTI1Y2M0MzYzZDdkMDJiNDFhNDYxODM3NjI1MjRlZTI1NDgxY2VjIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6Ik9DeE1iRUtRZjVlS0lPWjh5UVl1VUE9PSIsInZhbHVlIjoiSE9aN2c2STIvN241NGJpZ3ZiNnJLUU0zamlUbm0rbG5rMHIzRXJlWjhzSXU1R2MwMktlNjkxWVZWbmRaNGZuckZDc000SFYyd2pNdHhlUE5QMkliMTk1ZWtDMS81NVJoMjV2V0IwQ0dXejJTZU1qdVIwVk5KMTNFN0tDeWhsc1YiLCJtYWMiOiJiYTFlODVmMmU2NWQ3NWE0YTNmMzQ3NWU3M2JiNWU2NDE1MjhhZDQzNDRmMzc0OTM2ZmUxZTRmMzM5ODJlZGJkIiwidGFnIjoiIn0%3D' \
--data-raw '{
    "correo": "ana@123.com",
    "clave": "ana123"
}'
```

## Estructura principal

- Controlador principal: [`App\Http\Controllers\proyectoController`](proyecto1/proyecto1/app/Http/Controllers/proyectoController.php)
- Modelo de proyectos: [`App\Models\Proyecto`](proyecto1/proyecto1/app/Models/Proyecto.php)
- Modelo de usuario: ['App\Models\Usuario'](../Proyecto-1/app/Models/Usuario.php)
- Servicio UF: [`App\Services\UfService`](proyecto1/proyecto1/app/Services/UfService.php)

## Tests

Ejecuta los tests con:

```sh
php artisan test
```

## Posibles errores al iniciar y correr el proyecto.
- Caché
Limpiar caché y luego cargar nuevamente la configuración

```sh
php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

