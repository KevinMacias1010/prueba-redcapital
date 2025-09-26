<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CotizacionesSeeder extends Seeder
{
    /**
     * Crea cotizaciones de ejemplo con líneas y recalcula el total bruto.
     */
    public function run(): void
    {
        $now = now();

        // Obtener usuarios y productos base
        $usuarios = DB::table('usuarios')->select('id')->get();
        $productos = DB::table('productos')->select('sku', 'precio_unitario')->get();

        if ($usuarios->isEmpty() || $productos->isEmpty()) {
            return; // nada que seedear si faltan datos base
        }

        // Preparar algunos combos de líneas por cotización
        $lineasEjemplo = [
            [
                ['sku' => $productos[0]->sku, 'cantidad' => 2, 'precio' => $productos[0]->precio_unitario],
                ['sku' => $productos[1]->sku ?? $productos[0]->sku, 'cantidad' => 1, 'precio' => ($productos[1]->precio_unitario ?? $productos[0]->precio_unitario)],
            ],
            [
                ['sku' => $productos[1]->sku ?? $productos[0]->sku, 'cantidad' => 3, 'precio' => ($productos[1]->precio_unitario ?? $productos[0]->precio_unitario)],
                ['sku' => $productos[2]->sku ?? $productos[0]->sku, 'cantidad' => 5, 'precio' => ($productos[2]->precio_unitario ?? $productos[0]->precio_unitario)],
            ],
        ];

        // Crear 2 cotizaciones: una para el primer usuario y otra para el segundo (si existe)
        for ($i = 0; $i < 2; $i++) {
            $usuarioId = $usuarios[$i % $usuarios->count()]->id;

            // Insertar cabecera
            $cotizacionId = DB::table('cotizaciones_c')->insertGetId([
                'usuario_id' => $usuarioId,
                'fecha_emision' => $now->copy()->subDays(1 - $i),
                'total_bruto' => 0,
                'fecha_registro' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $total = 0;
            foreach ($lineasEjemplo[$i] as $linea) {
                $subtotal = $linea['precio'] * $linea['cantidad'];
                $total += $subtotal;

                DB::table('cotizaciones_d')->insert([
                    'cotizacion_id' => $cotizacionId,
                    'producto_sku' => $linea['sku'],
                    'cantidad' => $linea['cantidad'],
                    'precio_unitario' => $linea['precio'],
                    'fecha_registro' => $now,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            // Actualizar total bruto en cabecera
            DB::table('cotizaciones_c')
                ->where('id', $cotizacionId)
                ->update(['total_bruto' => $total, 'updated_at' => now()]);
        }
    }
}


