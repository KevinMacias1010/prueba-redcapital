<?php

namespace Database\Seeders;

use App\Models\Usuario as User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Crea usuarios iniciales (admin y usuario estándar).
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@redcapital.test'],
            [
                'nombre' => 'Admin',
                'apellido' => 'RedCapital',
                'edad' => 30,
                'password' => Hash::make('password'),
                'admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@redcapital.test'],
            [
                'nombre' => 'Usuario',
                'apellido' => 'Ejemplo',
                'edad' => 20,
                'password' => Hash::make('password'),
                'admin' => false,
            ]
        );
    }
}


