<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'correo', 'clave',
    ];

    protected $hidden = [
        'clave',
    ];

    // Usamos 'clave' como password field
    public function getAuthPassword()
    {
        return $this->clave;
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'created_by');
    }

    // JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
