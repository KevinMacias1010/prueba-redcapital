# RedCapital - Sistema de Cotizaciones

Sistema web para gestión de cotizaciones, productos y usuarios desarrollado en Laravel.

## 🚀 Instalación Rápida

### 1. Clonar y configurar
```bash
git clone https://github.com/tu-usuario/redcapital.git
cd redcapital
composer install
```

### 2. Configurar base de datos
```bash
# Copiar archivo de configuración
cp .env.example .env

# Editar .env con tus datos de MySQL
DB_DATABASE=redcapital
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### 3. Instalar
```bash
# Generar clave
php artisan key:generate

# Ejecutar migraciones
php artisan migrate

# Iniciar servidor
php artisan serve
```

## 👤 Crear Usuario Administrador

```bash
php artisan tinker
```

```php
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

Usuario::create([
    'nombre' => 'Admin',
    'apellido' => 'RedCapital',
    'email' => 'admin@redcapital.com',
    'password' => Hash::make('password'),
    'edad' => 25,
    'admin' => true
]);
```

## 📧 Ver Emails (Desarrollo)

Los emails se guardan en: `storage/logs/laravel.log`

```bash
# Ver en tiempo real
tail -f storage/logs/laravel.log
```

## 🔧 Comandos Útiles

```bash
# Limpiar cache
php artisan cache:clear

# Ejecutar migraciones
php artisan migrate

# Reset completo
php artisan migrate:fresh
```

## 📱 Acceso

- **URL**: http://localhost:8000
- **Login**: admin@redcapital.com
- **Password**: password

## 🛠️ Tecnologías

- Laravel 12.31.1
- Materialize CSS
- MySQL
- PHP 8.2+

## 👨‍💻 Desarrollador

**Kevin Macías** - Proyecto de prueba técnica

---

**¡Listo!** El sistema estará funcionando en http://localhost:8000