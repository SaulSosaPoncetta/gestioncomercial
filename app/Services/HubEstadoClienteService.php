<?php

namespace App\Services;

use App\Models\Empresa;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Consulta el estado de pago de la empresa contra MiGestión Panel (el hub),
 * y cachea el resultado localmente para no pegarle a la API en cada login.
 */
class HubEstadoClienteService
{
    public function sincronizar(Empresa $empresa, bool $forzar = false): Empresa
    {
        if (! config('migestion_hub.url') || ! config('migestion_hub.api_key')) {
            return $empresa;
        }

        $cacheVencida = ! $empresa->fecha_verificacion_pago
            || $empresa->fecha_verificacion_pago->addHours((int) config('migestion_hub.cache_horas'))->isPast();

        if (! $forzar && ! $cacheVencida) {
            return $empresa;
        }

        try {
            $response = Http::withHeaders(['X-Api-Key' => config('migestion_hub.api_key')])
                ->timeout(5)
                ->get(rtrim(config('migestion_hub.url'), '/').'/api/estado-cliente', [
                    'referencia_externa' => (string) $empresa->id_empresa,
                ]);

            if ($response->status() === 404) {
                $empresa->fecha_verificacion_pago = now();
                $empresa->save();

                return $empresa;
            }

            $response->throw();
            $datos = $response->json();

            $empresa->estado_pago = match ($datos['estado'] ?? null) {
                'activa' => 'activa',
                'vencida' => 'vencida',
                'suspendida' => 'suspendida',
                'cancelada' => 'cancelada',
                default => $empresa->estado_pago,
            };
            $empresa->fecha_verificacion_pago = now();
            $empresa->save();
        } catch (\Throwable $e) {
            Log::warning('No se pudo verificar el estado de pago contra el hub', [
                'id_empresa' => $empresa->id_empresa,
                'error' => $e->getMessage(),
            ]);
        }

        return $empresa;
    }
}
