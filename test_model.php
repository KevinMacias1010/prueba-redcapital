<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Cotizacion;

echo "=== VERIFICAR MODELO COTIZACION ===\n";
$cotizacion = Cotizacion::find(3);
if ($cotizacion) {
    echo "Cotización 3: ENCONTRADA\n";
    echo "ID: {$cotizacion->id}\n";
    echo "Usuario ID: {$cotizacion->usuario_id}\n";
    echo "Tabla: {$cotizacion->getTable()}\n";
} else {
    echo "Cotización 3: NO ENCONTRADA\n";
}

echo "\n=== TODAS LAS COTIZACIONES ===\n";
$todas = Cotizacion::all();
foreach ($todas as $c) {
    echo "ID: {$c->id}, Usuario: {$c->usuario_id}\n";
}

