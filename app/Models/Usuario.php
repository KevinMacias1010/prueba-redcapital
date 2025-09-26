<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Notifications\ResetPasswordNotification;

/**
 * Modelo Usuario
 */
class Usuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    /** Atributos asignables en masa. */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'token',
        'edad',
        'admin',
    ];

    /** Atributos ocultos en serialización. */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** Casts. */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'admin' => 'boolean',
            'edad' => 'integer',
        ];
    }

    /** Relación: usuario tiene muchas cotizaciones. */
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'usuario_id');
    }

    /** Eventos: generar token UUID por defecto. */
    protected static function booted(): void
    {
        static::creating(function (self $user): void {
            if (empty($user->token)) {
                $user->token = (string) Str::uuid();
            }
        });
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}


