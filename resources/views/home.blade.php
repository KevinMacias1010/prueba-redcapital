@php($title = 'Inicio')
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card banner-card" style="background: linear-gradient(115deg,#fde68a,#93c5fd); border-radius: 14px;">
            <div style="display:flex; align-items:center; justify-content:space-between; padding:22px 26px;">
                <div>
                    <h5 style="margin:0; font-size:28px; font-weight:700; color:#1f2937;">Hola, {{ $usuario->nombre }} {{ $usuario->apellido }} 👋</h5>
                    <p style="margin:6px 0 0; color:#374151;">Bienvenido de vuelta. Accede rápidamente a los módulos del sistema.</p>
                </div>
                
            </div>
        </div>
    </div>

    <style>
        .module-tile { display:block; color:#fff; border-radius:18px; padding:18px 18px 16px; box-shadow: 0 10px 20px rgba(0,0,0,.12); position:relative; overflow:hidden; transition: transform .15s ease, box-shadow .15s ease; }
        .module-tile:hover { transform: translateY(-2px); box-shadow: 0 16px 28px rgba(0,0,0,.18); }
        .tile-title { font-weight:700; font-size:18px; margin:6px 0 10px; }
        .tile-meta { display:flex; align-items:center; gap:10px; opacity:.95; font-size:13px; }
        .tile-corner { position:absolute; right:12px; top:12px; opacity:.85; }
        .tile-icon { background:rgba(255,255,255,.25); border-radius:10px; padding:6px; display:inline-flex; }
        .grid-gap { margin: -8px; }
        .grid-gap > [class*='col'] { padding: 8px; }
    </style>

    <div class="col s12">
        <div class="row grid-gap">
            <div class="col s12 m6 l4">
                <a href="{{ route('productos.index') }}" class="module-tile" style="background:#e74c3c;">
                    <span class="tile-corner material-icons">more_horiz</span>
                    <div class="tile-icon"><span class="material-icons">inventory_2</span></div>
                    <div class="tile-title">Productos</div>
                    <div class="tile-meta">
                        <span class="material-icons" style="font-size:16px;">description</span>
                        Catálogo y precios
                    </div>
                </a>
            </div>
            <div class="col s12 m6 l4">
                <a href="{{ route('cotizaciones.index') }}" class="module-tile" style="background:#5b6ef5;">
                    <span class="tile-corner material-icons">more_horiz</span>
                    <div class="tile-icon"><span class="material-icons">receipt_long</span></div>
                    <div class="tile-title">Cotizaciones</div>
                    <div class="tile-meta">
                        <span class="material-icons" style="font-size:16px;">event_note</span>
                        Gestión y exportación
                    </div>
                </a>
            </div>
            @if($usuario->admin)
            <div class="col s12 m6 l4">
                <a href="{{ route('usuarios.index') }}" class="module-tile" style="background:#f0a92a;">
                    <span class="tile-corner material-icons">more_horiz</span>
                    <div class="tile-icon"><span class="material-icons">group</span></div>
                    <div class="tile-title">Usuarios</div>
                    <div class="tile-meta">
                        <span class="material-icons" style="font-size:16px;">admin_panel_settings</span>
                        Cuentas y permisos
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
    @csrf
</form>
@endsection


