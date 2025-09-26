<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - RedCapital</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 300;
        }
        
        .email-body {
            padding: 40px 30px;
        }
        
        .email-body h2 {
            color: #333;
            margin-top: 0;
            font-size: 20px;
        }
        
        .email-body p {
            margin-bottom: 20px;
            color: #666;
        }
        
        .reset-button {
            display: inline-block;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 20px 0;
            transition: all 0.3s ease;
        }
        
        .reset-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(238, 90, 36, 0.4);
        }
        
        .security-info {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .security-info h3 {
            color: #333;
            margin-top: 0;
            font-size: 16px;
        }
        
        .security-info ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        
        .security-info li {
            margin-bottom: 5px;
            color: #666;
        }
        
        .email-footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        
        .email-footer p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }
        
        .link-fallback {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            word-break: break-all;
        }
        
        .link-fallback p {
            margin: 0;
            font-size: 12px;
            color: #666;
        }
        
        .link-fallback a {
            color: #ee5a24;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>RedCapital</h1>
        </div>
        
        <div class="email-body">
            <h2>Restablecer Contraseña</h2>
            
            <p>Hola <strong>{{ $user->nombre }} {{ $user->apellido }}</strong>,</p>
            
            <p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en RedCapital.</p>
            
            <p>Si solicitaste este cambio, haz clic en el botón de abajo para crear una nueva contraseña:</p>
            
            <div style="text-align: center;">
                <a href="{{ $resetUrl }}" class="reset-button">
                    Restablecer Contraseña
                </a>
            </div>
            
            <div class="security-info">
                <h3>🔒 Información de Seguridad</h3>
                <ul>
                    <li>Este enlace expirará en 60 minutos por seguridad</li>
                    <li>Solo puede ser usado una vez</li>
                    <li>Si no solicitaste este cambio, ignora este email</li>
                    <li>Tu contraseña actual seguirá funcionando hasta que la cambies</li>
                </ul>
            </div>
            
            <p>Si el botón no funciona, copia y pega este enlace en tu navegador:</p>
            
            <div class="link-fallback">
                <p><strong>Enlace de restablecimiento:</strong></p>
                <a href="{{ $resetUrl }}">{{ $resetUrl }}</a>
            </div>
            
            <p>Si tienes alguna pregunta, no dudes en contactarnos.</p>
            
            <p>Saludos,<br><strong>El equipo de RedCapital</strong></p>
        </div>
        
        <div class="email-footer">
            <p><strong>RedCapital</strong> - Sistema de Cotizaciones</p>
            <p>Desarrollado por Kevin Macías</p>
            <p>Este es un email automático, por favor no respondas a este mensaje.</p>
        </div>
    </div>
</body>
</html>
