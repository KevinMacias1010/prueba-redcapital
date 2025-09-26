<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuario menor de edad creado</title>
</head>
<body>
    <h2>Alerta: Usuario menor de edad creado</h2>
    <p>Se ha creado un usuario menor de edad. Detalles:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $usuario->nombre }} {{ $usuario->apellido }}</li>
        <li><strong>Email:</strong> {{ $usuario->email }}</li>
        <li><strong>Edad:</strong> {{ $usuario->edad ?? 'No informada' }}</li>
        <li><strong>Admin:</strong> {{ $usuario->admin ? 'Sí' : 'No' }}</li>
        <li><strong>Creado:</strong> {{ $usuario->created_at }}</li>
    </ul>
</body>
</html>



