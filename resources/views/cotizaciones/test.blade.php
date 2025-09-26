<!DOCTYPE html>
<html>
<head>
    <title>Test Cotización</title>
</head>
<body>
    <h1>Test - Cotización #{{ $cotizacion->id ?? 'NO ENCONTRADA' }}</h1>
    <p>Usuario: {{ $cotizacion->usuario->nombre ?? 'NO ENCONTRADO' }}</p>
    <p>Productos: {{ $cotizacion->productos->count() ?? 0 }}</p>
    <a href="{{ route('cotizaciones.index') }}">Volver</a>
</body>
</html>

