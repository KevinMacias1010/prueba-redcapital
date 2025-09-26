<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Iniciar sesión - RedCapital</title>
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
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 40px 30px 30px;
            text-align: center;
        }
        .login-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin: 0 0 10px;
            color: white;
        }
        .login-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
            line-height: 1.4;
        }
        .login-content {
            padding: 40px 30px;
        }
        .input-field input {
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .input-field input:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        }
        .input-field label {
            color: #6b7280;
            font-weight: 500;
        }
        .input-field label.active {
            color: #e74c3c;
        }
        .btn-login {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            border-radius: 12px;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            text-transform: none;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }
        .checkbox-container {
            margin: 20px 0;
        }
        .checkbox-container label {
            color: #374151;
            font-size: 14px;
        }
        .checkbox-container [type="checkbox"]:checked + span:not(.lever):before {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 5px;
        }
        .brand-info {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }
        .brand-info p {
            color: #6b7280;
            font-size: 13px;
            margin: 5px 0;
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
                <h1 class="login-title">Hola</h1>
                <p class="login-subtitle">Bienvenido a la intranet de RedCapital. Esta intranet hace parte del proyecto de prueba técnica de Kevin Macías del sistema de cotizaciones.</p>
            </div>
            
            <div class="login-content">
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    
                    <div class="input-field">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                        <label for="email">Email</label>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-field">
                        <input id="password" name="password" type="password" required>
                        <label for="password">Contraseña</label>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="checkbox-container">
                        <label>
                            <input type="checkbox" name="remember" />
                            <span>Recordarme</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-login waves-effect waves-light" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;">
                        <span class="material-icons" style="font-size: 20px;">login</span>
                        <span>Iniciar sesión</span>
                    </button>
                </form>
                
                <div class="forgot-password-link" style="text-align: center; margin-top: 20px;">
                    <a href="{{ route('password.request') }}" style="color: #666; text-decoration: none; font-size: 0.9rem; transition: color 0.3s ease;">
                        <i class="material-icons left" style="font-size: 16px;">lock_reset</i>
                        ¿Olvidaste tu contraseña?
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
</body>
</html>


