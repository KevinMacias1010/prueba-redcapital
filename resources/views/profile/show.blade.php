@php($title = 'Mi Perfil')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 m8 l6 offset-m2 offset-l3">
        <div class="card">
            <div class="card-content">
                <div class="center-align" style="margin-bottom: 24px;">
                    <i class="material-icons large" style="color: #666;">account_circle</i>
                    <h4 class="grey-text text-darken-2">{{ $user->nombre }} {{ $user->apellido }}</h4>
                    <p class="grey-text">{{ $user->email }}</p>
                </div>

                <div class="divider" style="margin: 24px 0;"></div>

                <div class="row">
                    <div class="col s12">
                        <h5 class="grey-text text-darken-2">Información Personal</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m6">
                        <div class="card-panel grey lighten-5">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s3">
                                    <i class="material-icons grey-text">person</i>
                                </div>
                                <div class="col s9">
                                    <strong>Nombre</strong><br>
                                    <span class="grey-text text-darken-1 email-text">{{ $user->nombre }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="card-panel grey lighten-5">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s3">
                                    <i class="material-icons grey-text">person_outline</i>
                                </div>
                                <div class="col s9">
                                    <strong>Apellido</strong><br>
                                    <span class="grey-text text-darken-1 email-text">{{ $user->apellido }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m6">
                        <div class="card-panel grey lighten-5">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s3">
                                    <i class="material-icons grey-text">email</i>
                                </div>
                                <div class="col s9">
                                    <strong>Email</strong><br>
                                    <span class="grey-text text-darken-1 email-text">{{ $user->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="card-panel grey lighten-5">
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s3">
                                    <i class="material-icons grey-text">cake</i>
                                </div>
                                <div class="col s9">
                                    <strong>Edad</strong><br>
                                    <span class="grey-text text-darken-1">{{ $user->edad }} años</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divider" style="margin: 24px 0;"></div>

                <div class="center-align">
                    <a href="{{ route('profile.edit') }}" class="btn waves-effect waves-light">
                        <i class="material-icons left">edit</i>
                        Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
