@php($title = 'Cotización #' . $cotizacion->id)
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Cotización #{{ $cotizacion->id }}</span>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col s12 m6">
                        <strong>Fecha de emisión:</strong><br>
                        {{ $cotizacion->fecha_emision ? $cotizacion->fecha_emision->format('d/m/Y H:i') : 'No especificada' }}
                    </div>
                    <div class="col s12 m6">
                        <strong>Creado por:</strong><br>
                        {{ $cotizacion->usuario ? $cotizacion->usuario->nombre . ' ' . $cotizacion->usuario->apellido : 'Usuario no encontrado' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">Productos cotizados</span>
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Producto</th>
                            <th class="right-align">Cantidad</th>
                            <th class="right-align">Precio unitario</th>
                            <th class="right-align">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cotizacion->productos as $producto)
                            <tr>
                                <td>{{ $producto->sku }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td class="right-align">{{ $producto->pivot->cantidad }}</td>
                                <td class="right-align">${{ number_format($producto->pivot->precio_unitario, 2) }}</td>
                                <td class="right-align">${{ number_format($producto->pivot->cantidad * $producto->pivot->precio_unitario, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="center-align red-text">No hay productos en esta cotización</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr style="border-top: 2px solid #e5e7eb;">
                            <td colspan="4" class="right-align" style="font-weight: 600; font-size: 1.125rem;">Total bruto:</td>
                            <td class="right-align" style="font-weight: 600; font-size: 1.125rem;">${{ number_format($cotizacion->total_bruto, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="center-align" style="margin-top: 20px;">
            <a href="{{ route('cotizaciones.index') }}" class="btn grey waves-effect waves-light">
                <span class="material-icons left">arrow_back</span>
                Volver al listado
            </a>
        </div>
    </div>
</div>
@endsection
