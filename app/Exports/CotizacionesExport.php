<?php

namespace App\Exports;

use App\Models\Cotizacion;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CotizacionesExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Resumen' => new ResumenCotizacionesSheet(),
            'Productos' => new ProductosCotizadosSheet(),
        ];
    }
}

class ResumenCotizacionesSheet implements FromCollection
{
    public function collection()
    {
        $cotizaciones = Cotizacion::with('usuario')
            ->orderBy('id')
            ->get();

        $data = collect([
            ['N° Cotización', 'Fecha Emisión', 'Total Bruto']
        ]);

        foreach ($cotizaciones as $cotizacion) {
            $data->push([
                $cotizacion->id,
                $cotizacion->fecha_emision ? $cotizacion->fecha_emision->format('d/m/Y') : 'N/A',
                '$' . number_format($cotizacion->total_bruto, 2)
            ]);
        }

        return $data;
    }

}

class ProductosCotizadosSheet implements FromCollection
{
    public function collection()
    {
        // Obtener todos los productos con estadísticas de cotización
        $productos = DB::table('productos')
            ->leftJoin('cotizaciones_d', 'productos.sku', '=', 'cotizaciones_d.producto_sku')
            ->select(
                'productos.sku',
                'productos.nombre',
                'productos.precio_unitario',
                DB::raw('COUNT(cotizaciones_d.id) as veces_cotizado'),
                DB::raw('COALESCE(SUM(cotizaciones_d.cantidad), 0) as total_cantidad'),
                DB::raw('COALESCE(SUM(cotizaciones_d.cantidad * cotizaciones_d.precio_unitario), 0) as total_calculado')
            )
            ->groupBy('productos.sku', 'productos.nombre', 'productos.precio_unitario')
            ->orderBy('productos.nombre')
            ->get();

        $data = collect([
            ['SKU', 'Nombre Producto', 'Precio Unitario', 'Veces Cotizado', 'Total Cantidad', 'Total Calculado']
        ]);

        foreach ($productos as $producto) {
            $data->push([
                $producto->sku,
                $producto->nombre,
                '$' . number_format($producto->precio_unitario, 2),
                $producto->veces_cotizado,
                $producto->total_cantidad,
                '$' . number_format($producto->total_calculado, 2)
            ]);
        }

        return $data;
    }

}
