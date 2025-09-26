@php($title = 'Nuevo usuario')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m10 l8 offset-m1 offset-l2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Nuevo Usuario</span>
                <p class="grey-text">Complete la información del usuario que desea agregar al sistema.</p>

                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf

                    <div class="input-field">
                        <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required>
                        <label for="nombre">Nombre</label>
                        @error('nombre')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="apellido" name="apellido" type="text" value="{{ old('apellido') }}" required>
                        <label for="apellido">Apellido</label>
                        @error('apellido')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                        <label for="email">Email</label>
                        @error('email')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="edad" name="edad" type="number" value="{{ old('edad') }}">
                        <label for="edad">Edad</label>
                        @error('edad')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="password" name="password" type="password" required>
                        <label for="password">Contraseña</label>
                        @error('password')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="password_confirmation" name="password_confirmation" type="password" required>
                        <label for="password_confirmation">Confirmar contraseña</label>
                    </div>

                    <p>
                        <label>
                            <input type="checkbox" name="admin" {{ old('admin') ? 'checked' : '' }} />
                            <span>Administrador</span>
                        </label>
                    </p>

                    <div class="section right-align">
                        <a href="{{ route('usuarios.index') }}" class="btn grey">
                            <span class="material-icons left">arrow_back</span>
                            Cancelar
                        </a>
                        <button type="submit" class="btn waves-effect waves-light">
                            <span class="material-icons left">save</span>
                            Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


