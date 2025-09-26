<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\UsuarioMenorCreado;

class UsuarioController extends Controller
{
    /**
     * Lista todos los usuarios (solo admin).
     */
    public function index()
    {
        $usuarios = Usuario::orderBy('nombre')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Muestra formulario para crear usuario.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Almacena nuevo usuario.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
            'edad' => 'nullable|integer|min:1|max:120',
            'admin' => 'boolean',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'edad' => $request->edad,
            'admin' => $request->has('admin'),
            'token' => Str::uuid(),
        ]);

        // Notificar a administradores si es menor de edad
        if (!is_null($usuario->edad) && (int) $usuario->edad < 18) {
            // Obtener correos de administradores desde la base (usuarios admin) o .env
            $admins = Usuario::where('admin', true)->pluck('email')->filter()->all();
            if (empty($admins) && config('mail.from.address')) {
                $admins = [config('mail.from.address')];
            }
            if (!empty($admins)) {
                foreach ($admins as $adminEmail) {
                    Mail::to($adminEmail)->queue(new UsuarioMenorCreado($usuario));
                }
            }
        }

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Muestra usuario específico.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Muestra formulario para editar usuario.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Actualiza usuario.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'password' => 'nullable|string|min:8|confirmed',
            'edad' => 'nullable|integer|min:1|max:120',
            'admin' => 'boolean',
        ]);

        $data = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'edad' => $request->edad,
            'admin' => $request->has('admin'),
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Elimina usuario.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado exitosamente.');
    }
}
