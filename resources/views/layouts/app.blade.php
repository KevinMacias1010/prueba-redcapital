<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title ?? 'RedCapital' }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        main { padding: 24px 0; }
        .nav-wrapper .brand { font-size: 1.8rem; font-weight: 600; color:#1f2937; }
        .btn .material-icons.left { margin-right:6px; line-height:inherit; vertical-align:middle; }
        .btn-small .material-icons.left { margin-right:4px; }
        .btn, .btn-small { display:inline-flex; align-items:center; }
        
        /* Responsive navbar */
        .nav-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            width: 100%;
        }
        
        .brand-logo {
            font-size: 1.8rem !important;
            font-weight: 600;
            color: #1f2937 !important;
            flex: 0 0 auto;
            margin-right: auto;
            padding-right: 20px;
        }
        
        /* Desktop navigation */
        .nav-wrapper ul.center {
            display: flex;
            align-items: center;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            margin: 0;
        }
        
        .nav-wrapper ul.center li {
            margin: 0 16px;
        }
        
        .nav-wrapper ul.right {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
            margin-left: auto;
            z-index: 1000;
        }
        
        /* Asegurar que el dropdown del usuario sea visible */
        .nav-wrapper ul.right li {
            display: block;
        }
        
        .nav-wrapper ul.right li a {
            display: flex;
            align-items: center;
            padding: 0 16px;
            color: #666 !important;
            text-decoration: none;
        }
        
        .nav-wrapper ul.right li a:hover {
            background-color: rgba(0,0,0,0.1);
        }
        
        /* Dropdown styling */
        .dropdown-content {
            min-width: 200px;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: 1px solid #e0e0e0;
            overflow: hidden;
        }
        
        .dropdown-content li {
            display: block;
            margin: 0;
            width: 100%;
        }
        
        .dropdown-content li a {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 14px 16px;
            line-height: 1.2;
            color: #333 !important;
            text-decoration: none;
            transition: background-color 0.2s ease;
            width: 100%;
            box-sizing: border-box;
            margin: 0;
            border: none;
            outline: none;
            min-height: 48px;
        }
        
        .dropdown-content li a:hover {
            background-color: rgba(0,0,0,0.08);
        }
        
        .dropdown-content li a .material-icons {
            margin-right: 12px;
            font-size: 20px;
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .dropdown-content li a .material-icons.left {
            margin-right: 12px;
            margin-left: 0;
        }
        
        .dropdown-content li.divider {
            margin: 4px 0;
            height: 1px;
            background-color: #e0e0e0;
        }
        
        /* Mobile menu */
        .sidenav-trigger {
            display: none !important;
        }
        
        @media only screen and (max-width: 992px) {
            .nav-wrapper {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 16px;
                width: 100%;
            }
            
            .brand-logo {
                margin-right: 0;
                padding-right: 0;
                flex: 0 0 auto;
                font-size: 1.6rem !important;
                order: 1;
                left: 5.5rem  !important;
            }
            
            .sidenav-trigger {
                display: block !important;
                margin-left: auto;
                padding: 8px 12px;
                color: #666;
                flex: 0 0 auto;
                order: 2;

            }
            
            .sidenav-trigger:hover {
                background-color: rgba(0,0,0,0.1);
                border-radius: 4px;
            }
            
            .nav-wrapper ul.center {
                display: none;
            }
            
            .nav-wrapper ul.right {
                display: none;
            }
        }
        
        @media only screen and (max-width: 600px) {
            .nav-wrapper {
                padding: 0 12px;
            }
            
            .brand-logo {
                font-size: 1.4rem !important;
                margin-right: 16px;
            }
            
            .sidenav-trigger {
                padding: 8px 8px;
                margin-left: 16px;
            }
            .sidenav-trigger i {
                line-height: 45px !important;
            }
        }
        
        /* Sidenav styling */
        .sidenav {
            width: 280px;
        }
        
        .sidenav li > a {
            padding: 16px 24px;
            display: flex;
            align-items: center;
            color: #333;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }
        
        .sidenav li > a:hover {
            background-color: rgba(0,0,0,0.05);
        }
        
        .sidenav .material-icons {
            margin-right: 16px;
            font-size: 20px;
            color: #666;
        }
        
        .sidenav .divider {
            margin: 8px 0;
            background-color: #e0e0e0;
        }
        
        /* Manejo de textos largos */
        .card-panel .grey-text {
            word-break: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }
        
        /* Asegurar que los emails largos no rompan el diseño */
        .email-text {
            word-break: break-all;
            overflow-wrap: break-word;
            max-width: 100%;
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0" style="border-bottom:1px solid #e5e7eb;">
        <div class="nav-wrapper container">
            <!-- Marca - Izquierda -->
            <a href="{{ route('home') }}" class="brand-logo left">RedCapital</a>
            
            <!-- Menú móvil -->
            <a href="#" data-target="mobile-menu" class="sidenav-trigger right">
                <i class="material-icons">menu</i>
            </a>
            
            <!-- Navegación central - Desktop -->
            <ul class="center hide-on-med-and-down">
                <li><a href="{{ route('productos.index') }}" class="grey-text text-darken-2">Productos</a></li>
                <li><a href="{{ route('cotizaciones.index') }}" class="grey-text text-darken-2">Cotizaciones</a></li>
                <li><a href="{{ route('usuarios.index') }}" class="grey-text text-darken-2">Usuarios</a></li>
            </ul>
            
            <!-- Usuario - Derecha -->
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger" href="#" data-target="user-dropdown">
                        <i class="material-icons left">account_circle</i>
                        {{ auth()->user()->nombre ?? 'Usuario' }}
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Menú móvil -->
    <ul class="sidenav" id="mobile-menu">
        <li><a href="{{ route('productos.index') }}"><i class="material-icons left">inventory</i>Productos</a></li>
        <li><a href="{{ route('cotizaciones.index') }}"><i class="material-icons left">description</i>Cotizaciones</a></li>
        <li><a href="{{ route('usuarios.index') }}"><i class="material-icons left">people</i>Usuarios</a></li>
        <li class="divider"></li>
        <li><a href="#" class="dropdown-trigger" data-target="user-dropdown-mobile">
            <i class="material-icons left">account_circle</i>
            {{ auth()->user()->nombre ?? 'Usuario' }}
        </a></li>
    </ul>
    <!-- Dropdown Structure -->
    <ul id="user-dropdown" class="dropdown-content">
        <li><a href="{{ route('profile.show') }}" class="grey-text text-darken-2"><i class="material-icons left">person</i>Perfil</a></li>
        <li class="divider" tabindex="-1"></li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-global').submit();" class="red-text">
                <i class="material-icons left">logout</i>Cerrar sesión
            </a>
        </li>
    </ul>
    
    <!-- Dropdown móvil -->
    <ul id="user-dropdown-mobile" class="dropdown-content">
        <li><a href="{{ route('profile.show') }}" class="grey-text text-darken-2"><i class="material-icons left">person</i>Perfil</a></li>
        <li class="divider" tabindex="-1"></li>
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-global').submit();" class="red-text">
                <i class="material-icons left">logout</i>Cerrar sesión
            </a>
        </li>
    </ul>
    
    <form id="logout-form-global" method="POST" action="{{ route('logout') }}" style="display:none;">
        @csrf
    </form>

    <main>
        <div class="container">
            @if(session('success'))
                <div class="card green lighten-5">
                    <div class="card-content green-text text-darken-3">
                        <span class="material-icons left" style="margin-right:8px;">check_circle</span>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar sidenav móvil
            var sidenavElems = document.querySelectorAll('.sidenav');
            M.Sidenav.init(sidenavElems);
            
            // Inicializar dropdowns
            var dropdownElems = document.querySelectorAll('.dropdown-trigger');
            console.log('Dropdown elements found:', dropdownElems.length);
            M.Dropdown.init(dropdownElems, { 
                constrainWidth: false, 
                coverTrigger: false, 
                alignment: 'right',
                hover: false
            });
        });
        @if(session('success'))
        M.toast({html: '{{ addslashes(session('success')) }}', classes: 'green'});
        @endif
    </script>
</body>
</html>


