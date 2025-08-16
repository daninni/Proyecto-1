<?php

namespace App\Models;

class DetalleIndicador
{
    public function __construct(
        public string $codigo,
        public string $nombre,
        public string $unidad_medida,
        public string $fecha,
        public string $valor,
    ) { 
        
    }
}