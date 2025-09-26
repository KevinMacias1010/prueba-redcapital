@echo off
echo ========================================
echo    RedCapital - Instalacion del Sistema
echo ========================================
echo.

echo [1/6] Instalando dependencias de Composer...
composer install
if %errorlevel% neq 0 (
    echo Error: No se pudieron instalar las dependencias de Composer
    pause
    exit /b 1
)

echo.
echo [2/6] Copiando archivo de configuracion...
if not exist .env (
    copy .env.example .env
    echo Archivo .env creado desde .env.example
) else (
    echo El archivo .env ya existe
)

echo.
echo [3/6] Generando clave de aplicacion...
php artisan key:generate
if %errorlevel% neq 0 (
    echo Error: No se pudo generar la clave de aplicacion
    pause
    exit /b 1
)

echo.
echo [4/6] Ejecutando migraciones...
php artisan migrate
if %errorlevel% neq 0 (
    echo Error: No se pudieron ejecutar las migraciones
    echo Verifique la configuracion de la base de datos en .env
    pause
    exit /b 1
)

echo.
echo [5/6] Limpiando cache...
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo.
echo [6/6] Creando usuario administrador...
echo.
echo Por favor, ejecute el siguiente comando para crear un usuario administrador:
echo.
echo php artisan tinker
echo.
echo Luego ejecute:
echo.
echo use App\Models\Usuario;
echo use Illuminate\Support\Facades\Hash;
echo Usuario::create([
echo     'nombre' => 'Admin',
echo     'apellido' => 'RedCapital', 
echo     'email' => 'admin@redcapital.com',
echo     'password' => Hash::make('password'),
echo     'edad' => 25,
echo     'admin' => true
echo ]);
echo.
echo exit
echo.

echo ========================================
echo    Instalacion completada exitosamente!
echo ========================================
echo.
echo Para iniciar el servidor ejecute:
echo php artisan serve
echo.
echo El sistema estara disponible en:
echo http://localhost:8000
echo.
pause
