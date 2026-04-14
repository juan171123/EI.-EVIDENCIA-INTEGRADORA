<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')

    <h1>USUARIOS REGISTRADOS</h1>

    <div class="d-flex justify-content-end mb-2">

        <a href="{{ route('usuarios.create') }}">
            <button class="btn btn-success me-3"><i class="fa-solid fa-plus"></i></button>
        </a>

        <form action="{{ route('cerrar') }}" method='POST'>
            @csrf 
            <button class="btn btn-danger me-3"><i class="fa-solid fa-arrow-left"></i> Cerrar sesion</button>
        </form>

        @if(auth()->user()->is_admin)
            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">
                Admin <i class="fa-solid fa-users-gear"></i>
            </a>
        @endif
    </div>

    @include('partials.alerts')

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
                <th>ADMIN</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->phone }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->is_admin ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>

                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                onclick="return confirm('¿Eliminar el registro?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @endsection
</body>
</html>