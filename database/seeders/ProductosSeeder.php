<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Crea productos de ejemplo con SKU explícito.
     */
    public function run(): void
    {
        $productos = [
            ['sku' => 'SKU-001', 'nombre' => 'Producto A', 'precio_unitario' => 1000.00],
            ['sku' => 'SKU-002', 'nombre' => 'Producto B', 'precio_unitario' => 2500.50],
            ['sku' => 'SKU-003', 'nombre' => 'Producto C', 'precio_unitario' => 500.75],
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->updateOrInsert(
                ['sku' => $producto['sku']],
                [
                    'nombre' => $producto['nombre'],
                    'precio_unitario' => $producto['precio_unitario'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}


