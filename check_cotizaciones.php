<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Cotizacion;
use App\Models\Usuario;

echo "=== COTIZACIONES EXISTENTES ===\n";
$cotizaciones = Cotizacion::with('usuario')->get();
foreach ($cotizaciones as $c) {
    echo "ID: {$c->id}, Usuario: " . ($c->usuario ? $c->usuario->nombre . ' ' . $c->usuario->apellido : 'NULL') . ", Fecha: " . ($c->fecha_emision ? $c->fecha_emision->format('Y-m-d H:i') : 'NULL') . "\n";
}

echo "\n=== USUARIOS EXISTENTES ===\n";
$usuarios = Usuario::all();
foreach ($usuarios as $u) {
    echo "ID: {$u->id}, Nombre: {$u->nombre} {$u->apellido}, Email: {$u->email}\n";
}

