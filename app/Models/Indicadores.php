<?php

namespace App\Models;

class Indicadores
{
    public function __construct(
        public string $version,
        public string $autor,
        public string $fecha,
        public DetalleIndicador $uf,
        public DetalleIndicador $ivp,
        public DetalleIndicador $dolar,
        public DetalleIndicador $dolarIntercambio,
        public DetalleIndicador $euro,
        public DetalleIndicador $ipc,
        public DetalleIndicador $utm,
        public DetalleIndicador $imacec,
        public DetalleIndicador $tpm,
        public DetalleIndicador $libra_cobre,
        public DetalleIndicador $tasa_desempleo,
        public DetalleIndicador $bitcoin,
    ) { 

    }
}
