@php($title = 'Cotizaciones')
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-content">
        <form method="GET" action="{{ route('cotizaciones.index') }}" class="row" style="margin-bottom:0;">
            <div class="input-field col s12 m3">
                <input type="date" id="fecha_desde" name="fecha_desde" value="{{ request('fecha_desde') }}">
                <label for="fecha_desde" class="active">Desde</label>
            </div>
            <div class="input-field col s12 m3">
                <input type="date" id="fecha_hasta" name="fecha_hasta" value="{{ request('fecha_hasta') }}">
                <label for="fecha_hasta" class="active">Hasta</label>
            </div>
            <div class="input-field col s12 m3">
                <input type="number" step="0.01" id="monto_minimo" name="monto_minimo" value="{{ request('monto_minimo') }}">
                <label for="monto_minimo" class="active">Monto mínimo</label>
            </div>
            <div class="input-field col s12 m3 right-align">
                <button type="submit" class="btn waves-effect">
                    <span class="material-icons left">filter_alt</span> Filtrar
                </button>
            </div>
        </form>
    </div>
</div>

<div class="section right-align">
    <a class="btn" href="{{ route('cotizaciones.create') }}">
        <span class="material-icons left">add</span> Nueva cotización
    </a>
    <a class="btn green" href="{{ route('cotizaciones.export') }}">
        <span class="material-icons left">file_download</span> Exportar Excel
    </a>
    </div>

<div class="card">
    <div class="card-content">
        @if(session('success'))
            <div class="card green lighten-5" style="margin-bottom:10px;">
                <div class="card-content green-text text-darken-3">{{ session('success') }}</div>
            </div>
        @endif
        <table class="striped responsive-table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Fecha emisión</th>
                    <th>Total bruto</th>
                    <th>Cantidad productos</th>
                    <th>Creador</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cotizaciones as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->fecha_emision }}</td>
                        <td>${{ number_format($c->total_bruto, 2) }}</td>
                        <td>{{ $c->products_count ?? $c->productos->count() }}</td>
                        <td>{{ $c->usuario->nombre }} {{ $c->usuario->apellido }}</td>
                        <td class="right-align">
                            <a class="btn-small blue waves-effect waves-light" href="{{ route('cotizaciones.show', $c) }}">
                                <span class="material-icons left">visibility</span> Ver
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="section">{{ $cotizaciones->links() }}</div>
    </div>
</div>
@endsection


