@php($title = 'Usuarios')
@extends('layouts.app')

@section('content')
<div class="right-align" style="margin-bottom:12px;">
    <a class="btn waves-effect waves-light" href="{{ route('usuarios.create') }}">
        <span class="material-icons left">person_add</span>
        Nuevo usuario
    </a>
    </div>
<div class="card">
    <div class="card-content">
        @if(session('success'))
            <div class="card green lighten-5" style="margin-bottom:10px;">
                <div class="card-content green-text text-darken-3">{{ session('success') }}</div>
            </div>
        @endif
        <table class="striped responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th class="center-align">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->nombre }} {{ $u->apellido }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->admin ? 'Sí' : 'No' }}</td>
                        <td class="center-align">
                            <a class="btn-small blue waves-effect waves-light" href="{{ route('usuarios.edit', $u) }}">
                                <span class="material-icons left">edit</span>
                                Editar
                            </a>
                            <form style="display:inline-block" method="POST" action="{{ route('usuarios.destroy', $u) }}" onsubmit="return confirm('¿Eliminar usuario?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small red waves-effect waves-light" type="submit">
                                    <span class="material-icons left">delete</span>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="section">{{ $usuarios->links() }}</div>
    </div>
</div>
@endsection


