<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Restablecer Contraseña - RedCapital</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body { 
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); 
            min-height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-header-bar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .login-header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1f2937;
            text-decoration: none;
        }
        .login-container { 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            padding: 80px 20px 20px; 
        }
        .login-card { 
            max-width: 420px; 
            width: 100%; 
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        .login-header h4 {
            margin: 0;
            font-weight: 300;
            font-size: 1.8rem;
        }
        
        .welcome-message {
            margin-top: 15px;
            font-size: 0.9rem;
            opacity: 0.9;
            line-height: 1.4;
        }
        
        .login-body {
            padding: 30px 20px;
        }
        
        .input-field {
            margin-bottom: 20px;
        }
        
        .input-field input:focus + label {
            color: #ee5a24 !important;
        }
        
        .input-field input:focus {
            border-bottom: 1px solid #ee5a24 !important;
            box-shadow: 0 1px 0 0 #ee5a24 !important;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            width: 100%;
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(238, 90, 36, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .back-link a:hover {
            color: #ee5a24;
        }
        
        .brand-info {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .brand-info p {
            margin: 5px 0;
            color: #666;
            font-size: 0.9rem;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 12px 20px;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .top-bar h5 {
            margin: 0;
            color: #333;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .password-requirements {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            color: #666;
        }
        
        .password-requirements h6 {
            margin: 0 0 8px 0;
            color: #333;
            font-size: 0.9rem;
        }
        
        .password-requirements ul {
            margin: 0;
            padding-left: 16px;
        }
    </style>
</head>
<body>
    <div class="login-header-bar">
        <div class="login-header-content">
            <a href="#" class="login-brand">RedCapital</a>
        </div>
    </div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h4>Hola</h4>
                <div class="welcome-message">
                    Bienvenido a la intranet de RedCapital. Esta intranet hace parte del proyecto de prueba técnica de Kevin Macías del sistema de cotizaciones.
                </div>
            </div>
            
            <div class="login-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        <i class="material-icons">check_circle</i>
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <i class="material-icons">error</i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <p class="grey-text" style="margin-bottom: 20px;">
                    Ingresa tu nueva contraseña para completar el restablecimiento.
                </p>

                <div class="password-requirements">
                    <h6>Requisitos de la contraseña:</h6>
                    <ul>
                        <li>Mínimo 8 caracteres</li>
                        <li>Debe contener al menos una letra</li>
                        <li>Se recomienda incluir números y símbolos</li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <div class="input-field">
                        <input id="email" name="email" type="email" class="validate" value="{{ $email }}" required readonly>
                        <label for="email">Email</label>
                    </div>

                    <div class="input-field">
                        <input id="password" name="password" type="password" class="validate" required>
                        <label for="password">Nueva Contraseña</label>
                    </div>

                    <div class="input-field">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="validate" required>
                        <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="material-icons">lock</i>
                        Restablecer Contraseña
                    </button>
                </form>

                <div class="back-link">
                    <a href="{{ route('login') }}">
                        <i class="material-icons left" style="font-size: 16px;">arrow_back</i>
                        Volver al Login
                    </a>
                </div>
                
                <div class="brand-info">
                    <p><strong>RedCapital</strong></p>
                    <p>Sistema de Cotizaciones</p>
                    <p>Desarrollado por Kevin Macías</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar Materialize
            M.updateTextFields();
        });
    </script>
</body>
</html>
