<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Indicadores;
use App\Models\DetalleIndicador;

class UfService
{
    public function getUfHoy()
    {
        \Log::info('Llamando a la API externa de mindicador.cl');
        $response = Http::get('https://mindicador.cl/api');
        if (!$response->successful()) {
            return null;
        }
        $data = $response->json();
        \Log::info('Respuesta HTTP', ['status' => $response->status(), 'body' => $response->body()]);

        return new Indicadores(
            version: $data['version'],
            autor: $data['autor'],
            fecha: $data['fecha'],
            uf: new DetalleIndicador(...array_values($data['uf'])),
            ivp: new DetalleIndicador(...array_values($data['ivp'])),
            dolar: new DetalleIndicador(...array_values($data['dolar'])),
            dolarIntercambio: new DetalleIndicador(...array_values($data['dolar_intercambio'])),
            euro: new DetalleIndicador(...array_values($data['euro'])),
            ipc: new DetalleIndicador(...array_values($data['ipc'])),
            utm: new DetalleIndicador(...array_values($data['utm'])),
            imacec: new DetalleIndicador(...array_values($data['imacec'])),
            tpm: new DetalleIndicador(...array_values($data['tpm'])),
            libra_cobre: new DetalleIndicador(...array_values($data['libra_cobre'])),
            tasa_desempleo: new DetalleIndicador(...array_values($data['tasa_desempleo'])),
            bitcoin: new DetalleIndicador(...array_values($data['bitcoin'])),
        );
    }
}