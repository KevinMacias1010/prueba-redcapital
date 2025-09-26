@php($title = 'Editar Perfil')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m10 l8 offset-m1 offset-l2">
        <div class="card">
            <div class="card-content">
                <div class="center-align" style="margin-bottom: 24px;">
                    <i class="material-icons large" style="color: #666;">edit</i>
                    <h4 class="grey-text text-darken-2">Editar Perfil</h4>
                    <p class="grey-text">Actualiza tu información personal</p>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input id="nombre" name="nombre" type="text" class="validate" value="{{ old('nombre', $user->nombre) }}" required>
                                <label for="nombre">Nombre</label>
                                @error('nombre')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input id="apellido" name="apellido" type="text" class="validate" value="{{ old('apellido', $user->apellido) }}" required>
                                <label for="apellido">Apellido</label>
                                @error('apellido')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input id="email" name="email" type="email" class="validate" value="{{ old('email', $user->email) }}" required>
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input id="edad" name="edad" type="number" class="validate" value="{{ old('edad', $user->edad) }}" min="1" max="120" required>
                                <label for="edad">Edad</label>
                                @error('edad')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="divider" style="margin: 24px 0;"></div>

                    <div class="row">
                        <div class="col s12">
                            <h6 class="grey-text text-darken-2">Cambiar Contraseña (Opcional)</h6>
                            <p class="grey-text">Deja estos campos vacíos si no quieres cambiar tu contraseña</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Nueva Contraseña</label>
                                @error('password')
                                    <span class="helper-text red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="input-field">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="validate">
                                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                            </div>
                        </div>
                    </div>

                    <div class="divider" style="margin: 24px 0;"></div>

                    <div class="row">
                        <div class="col s12">
                            <div class="card-panel grey lighten-5">
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s3">
                                        <i class="material-icons grey-text">admin_panel_settings</i>
                                    </div>
                                    <div class="col s9">
                                        <strong>Rol</strong><br>
                                        <span class="grey-text text-darken-1">
                                            @if($user->admin)
                                                <span class="chip red lighten-4 red-text text-darken-2">Administrador</span>
                                            @else
                                                <span class="chip blue lighten-4 blue-text text-darken-2">Usuario</span>
                                            @endif
                                        </span>
                                        <br>
                                        <small class="grey-text">El rol no puede ser modificado desde aquí</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="center-align" style="margin-top: 24px;">
                        <a href="{{ route('profile.show') }}" class="btn grey waves-effect waves-light">
                            <i class="material-icons left">cancel</i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn waves-effect waves-light">
                            <i class="material-icons left">save</i>
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
