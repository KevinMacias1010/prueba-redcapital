<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Cotizacion;
use Illuminate\Support\Facades\DB;

echo "=== COTIZACIONES EN cotizaciones_c ===\n";
$cotizaciones = DB::table('cotizaciones_c')->get();
foreach ($cotizaciones as $c) {
    echo "ID: {$c->id}, Usuario ID: {$c->usuario_id}, Fecha: {$c->fecha_emision}\n";
}

echo "\n=== DETALLES EN cotizaciones_d ===\n";
$detalles = DB::table('cotizaciones_d')->get();
foreach ($detalles as $d) {
    echo "ID: {$d->id}, Cotizacion ID: {$d->cotizacion_id}, SKU: {$d->producto_sku}, Cantidad: {$d->cantidad}\n";
}

echo "\n=== VERIFICAR COTIZACION 3 ===\n";
$cotizacion3 = Cotizacion::find(3);
if ($cotizacion3) {
    echo "Cotización 3 existe\n";
    $cotizacion3->load(['usuario', 'productos']);
    echo "Usuario: " . ($cotizacion3->usuario ? $cotizacion3->usuario->nombre : 'NULL') . "\n";
    echo "Productos: " . $cotizacion3->productos->count() . "\n";
} else {
    echo "Cotización 3 NO existe\n";
}

