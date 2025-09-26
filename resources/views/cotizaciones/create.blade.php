@php($title = 'Nueva cotización')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m10 l8 offset-m1 offset-l2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Nueva Cotización</span>
                <p class="grey-text">Agregue productos y configure la cotización.</p>

                <form method="POST" action="{{ route('cotizaciones.store') }}">
                    @csrf
                    
                    <table class="striped responsive-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>
                                    <div class="input-field">
                                        <select name="productos[0][producto_id]" required>
                                            <option value="" disabled selected>Seleccione un producto</option>
                                            @foreach($productos as $p)
                                                <option value="{{ $p->sku }}">{{ $p->sku }} - {{ $p->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-field">
                                        <input type="number" step="1" min="1" name="productos[0][cantidad]" value="1" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-field">
                                        <input type="number" step="0.01" min="0" name="productos[0][precio_unitario]" value="0" required>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="section">
                        <button type="button" class="btn blue waves-effect waves-light" onclick="addRow()">
                            <span class="material-icons left">add</span>
                            Agregar producto
                        </button>
                    </div>

                    <div class="section right-align">
                        <a href="{{ route('cotizaciones.index') }}" class="btn grey">
                            <span class="material-icons left">arrow_back</span>
                            Cancelar
                        </a>
                        <button type="submit" class="btn waves-effect waves-light">
                            <span class="material-icons left">save</span>
                            Guardar Cotización
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function addRow(){
        const tbody = document.getElementById('tbody');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <div class="input-field">
                    <select name="productos[${tbody.children.length}][producto_id]" required>
                        <option value="" disabled selected>Seleccione un producto</option>
                        ${window.PRODUCT_OPTIONS}
                    </select>
                </div>
            </td>
            <td>
                <div class="input-field">
                    <input type="number" step="1" min="1" name="productos[${tbody.children.length}][cantidad]" value="1" required>
                </div>
            </td>
            <td>
                <div class="input-field">
                    <input type="number" step="0.01" min="0" name="productos[${tbody.children.length}][precio_unitario]" value="0" required>
                </div>
            </td>
        `;
        tbody.appendChild(row);
        
        // Reinitialize Materialize components for new row
        M.FormSelect.init(row.querySelectorAll('select'));
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        M.FormSelect.init(document.querySelectorAll('select'));
    });
</script>

<script>
    window.PRODUCT_OPTIONS = `@foreach($productos as $p)<option value="{{ $p->sku }}">{{ $p->sku }} - {{ $p->nombre }}</option>@endforeach`;
</script>
@endsection


