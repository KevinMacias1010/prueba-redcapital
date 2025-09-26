<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta de prueba para exportación
Route::get('/test-export', function () {
    $content = "Prueba de descarga\n";
    $content .= "Fecha: " . now()->format('Y-m-d H:i:s') . "\n";
    return response($content)
        ->header('Content-Type', 'text/plain')
        ->header('Content-Disposition', 'attachment; filename="test.txt"');
});

// Exportación de cotizaciones (sin middleware auth por ahora)
Route::get('/cotizaciones/export', [CotizacionController::class, 'export'])->name('cotizaciones.export');

// Rutas de autenticación (Breeze)
require __DIR__.'/auth.php';

// Rutas de recuperación de contraseña
Route::get('/forgot-password', [App\Http\Controllers\Auth\PasswordResetController::class, 'showRequestForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\Auth\PasswordResetController::class, 'reset'])->name('password.update');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Perfil del usuario
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Productos (todos los usuarios autenticados)
    Route::resource('productos', ProductoController::class);
    
    // Cotizaciones (todos los usuarios autenticados)
    Route::resource('cotizaciones', CotizacionController::class);
    
    // Usuarios (solo admin)
    Route::middleware(['isAdmin'])->group(function () {
        Route::resource('usuarios', UsuarioController::class);
    });
});
