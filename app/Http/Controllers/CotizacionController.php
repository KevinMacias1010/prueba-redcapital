<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\Producto;
use App\Exports\CotizacionesExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CotizacionController extends Controller
{
    /**
     * Lista todas las cotizaciones.
     */
    public function index(Request $request)
    {
        $query = Cotizacion::with(['usuario', 'productos']);

        // Filtros opcionales
        if ($request->filled('fecha_desde')) {
            $query->whereDate('fecha_emision', '>=', $request->fecha_desde);
        }
        if ($request->filled('fecha_hasta')) {
            $query->whereDate('fecha_emision', '<=', $request->fecha_hasta);
        }
        if ($request->filled('monto_minimo')) {
            $query->where('total_bruto', '>=', $request->monto_minimo);
        }

        $cotizaciones = $query->orderBy('fecha_emision', 'desc')->paginate(5);
        
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    /**
     * Muestra formulario para crear cotización.
     */
    public function create()
    {
        $productos = Producto::orderBy('nombre')->get();
        return view('cotizaciones.create', compact('productos'));
    }

    /**
     * Almacena nueva cotización.
     */
    public function store(Request $request)
    {
        $request->validate([
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|exists:productos,sku',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            // Crear cabecera
            $cotizacion = Cotizacion::create([
                'usuario_id' => auth()->id(),
                'fecha_emision' => now(),
                'total_bruto' => 0,
            ]);

            $total = 0;
            foreach ($request->productos as $producto) {
                $subtotal = $producto['precio_unitario'] * $producto['cantidad'];
                $total += $subtotal;

                // Crear línea de detalle
                $cotizacion->productos()->attach($producto['producto_id'], [
                    'cantidad' => $producto['cantidad'],
                    'precio_unitario' => $producto['precio_unitario'],
                    'fecha_registro' => now(),
                ]);
            }

            // Actualizar total bruto
            $cotizacion->update(['total_bruto' => $total]);
        });

        return redirect()->route('cotizaciones.index')
            ->with('success', 'Cotización creada exitosamente.');
    }

    /**
     * Muestra cotización específica.
     */
    public function show($id)
    {
        $cotizacion = Cotizacion::find($id);
        if (!$cotizacion) {
            return redirect()->route('cotizaciones.index')
                ->with('error', 'Cotización no encontrada.');
        }
        
        $cotizacion->load(['usuario', 'productos']);
        return view('cotizaciones.show', compact('cotizacion'));
    }

    /**
     * Exporta cotizaciones a Excel.
     */
    public function export()
    {
        try {
            $fileName = 'cotizaciones_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
            
            return Excel::download(new CotizacionesExport, $fileName);
        } catch (\Exception $e) {
            // Si falla Excel, usar CSV como respaldo
            $cotizaciones = Cotizacion::with('usuario')->get();
            $csvContent = "N° Cotización,Fecha Emisión,Total Bruto,Usuario\n";
            
            foreach ($cotizaciones as $cotizacion) {
                $csvContent .= sprintf(
                    "%d,%s,$%.2f,%s %s\n",
                    $cotizacion->id,
                    $cotizacion->fecha_emision ? $cotizacion->fecha_emision->format('d/m/Y') : 'N/A',
                    $cotizacion->total_bruto,
                    $cotizacion->usuario->nombre ?? 'N/A',
                    $cotizacion->usuario->apellido ?? ''
                );
            }
            
            $fileName = 'cotizaciones_' . now()->format('Y-m-d_H-i-s') . '.csv';
            return response($csvContent)
                ->header('Content-Type', 'text/csv; charset=utf-8')
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
        }
    }
}
