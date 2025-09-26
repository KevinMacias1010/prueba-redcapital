#!/bin/bash

echo "========================================"
echo "   RedCapital - Instalacion del Sistema"
echo "========================================"
echo

echo "[1/6] Instalando dependencias de Composer..."
composer install
if [ $? -ne 0 ]; then
    echo "Error: No se pudieron instalar las dependencias de Composer"
    exit 1
fi

echo
echo "[2/6] Copiando archivo de configuracion..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo "Archivo .env creado desde .env.example"
else
    echo "El archivo .env ya existe"
fi

echo
echo "[3/6] Generando clave de aplicacion..."
php artisan key:generate
if [ $? -ne 0 ]; then
    echo "Error: No se pudo generar la clave de aplicacion"
    exit 1
fi

echo
echo "[4/6] Ejecutando migraciones..."
php artisan migrate
if [ $? -ne 0 ]; then
    echo "Error: No se pudieron ejecutar las migraciones"
    echo "Verifique la configuracion de la base de datos en .env"
    exit 1
fi

echo
echo "[5/6] Limpiando cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo
echo "[6/6] Configurando permisos..."
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

echo
echo "========================================"
echo "   Instalacion completada exitosamente!"
echo "========================================"
echo
echo "Para iniciar el servidor ejecute:"
echo "php artisan serve"
echo
echo "El sistema estara disponible en:"
echo "http://localhost:8000"
echo
echo "Para crear un usuario administrador ejecute:"
echo "php artisan tinker"
echo
echo "Luego ejecute:"
echo "use App\Models\Usuario;"
echo "use Illuminate\Support\Facades\Hash;"
echo "Usuario::create(["
echo "    'nombre' => 'Admin',"
echo "    'apellido' => 'RedCapital',"
echo "    'email' => 'admin@redcapital.com',"
echo "    'password' => Hash::make('password'),"
echo "    'edad' => 25,"
echo "    'admin' => true"
echo "]);"
echo "exit"
echo
