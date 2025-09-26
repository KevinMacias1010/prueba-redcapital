@php($title = 'Editar usuario')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m10 l8 offset-m1 offset-l2">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Editar Usuario</span>
                <p class="grey-text">Modifique la información del usuario según sea necesario.</p>

                <form method="POST" action="{{ route('usuarios.update', $usuario) }}">
                    @csrf
                    @method('PUT')

                    <div class="input-field">
                        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $usuario->nombre) }}" required>
                        <label for="nombre" class="active">Nombre</label>
                        @error('nombre')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="apellido" name="apellido" type="text" value="{{ old('apellido', $usuario->apellido) }}" required>
                        <label for="apellido" class="active">Apellido</label>
                        @error('apellido')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="email" name="email" type="email" value="{{ old('email', $usuario->email) }}" required>
                        <label for="email" class="active">Email</label>
                        @error('email')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="edad" name="edad" type="number" value="{{ old('edad', $usuario->edad) }}">
                        <label for="edad" class="active">Edad</label>
                        @error('edad')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="password" name="password" type="password">
                        <label for="password">Nueva contraseña (opcional)</label>
                        @error('password')<span class="red-text text-darken-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="input-field">
                        <input id="password_confirmation" name="password_confirmation" type="password">
                        <label for="password_confirmation">Confirmar contraseña</label>
                    </div>

                    <p>
                        <label>
                            <input type="checkbox" name="admin" {{ old('admin', $usuario->admin) ? 'checked' : '' }} />
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
                            Actualizar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


