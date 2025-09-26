@php($title = 'Editar producto')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m10 l8 offset-m1 offset-l2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Editar Producto</span>
                <p class="grey-text">Modifique la información del producto según sea necesario.</p>

                <form method="POST" action="{{ route('productos.update', $producto) }}">
                    @csrf
                    @method('PUT')

                    <div class="input-field">
                        <input id="sku" name="sku" type="text" value="{{ old('sku', $producto->sku) }}" required>
                        <label for="sku" class="active">SKU (Código del Producto)</label>
                        @error('sku')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $producto->nombre) }}" required>
                        <label for="nombre" class="active">Nombre del Producto</label>
                        @error('nombre')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="precio_unitario" name="precio_unitario" type="number" step="0.01" min="0" value="{{ old('precio_unitario', $producto->precio_unitario) }}" required>
                        <label for="precio_unitario" class="active">Precio Unitario</label>
                        @error('precio_unitario')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="section right-align">
                        <a href="{{ route('productos.index') }}" class="btn grey">
                            <span class="material-icons left">arrow_back</span>
                            Cancelar
                        </a>
                        <button type="submit" class="btn waves-effect waves-light">
                            <span class="material-icons left">save</span>
                            Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
