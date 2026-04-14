<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>EDITAR USUARIO: {{ $usuario->name }}</h1>

    @include('partials.alerts')
    @include('partials.errors')

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-user"></i>
            </span>
            <input type="text" name="name" value="{{ old('name', $usuario->name) }}" placeholder="Nombre completo" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-phone"></i>
            </span>
            <input type="text" name="phone" value="{{ old('phone', $usuario->phone) }}" placeholder="Número de teléfono" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-envelope"></i>
            </span>
            <input type="email" name="email" value="{{ old('email', $usuario->email) }}" placeholder="Correo electrónico" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-key"></i>
            </span>
            <input type="password" name="password" placeholder="Nueva contraseña (dejar vacío para no cambiar)" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="is_admin"
                {{ old('is_admin', $usuario->is_admin) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_admin">Es administrador</label>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-pen-to-square"></i> Guardar
            </button>

            <a href="{{ route('usuarios.index') }}">
                <button type="button" class="btn btn-danger">
                    <i class="fa-solid fa-arrow-rotate-right"></i> Volver
                </button>
            </a>
        </div>

    </form>

    @endsection
</body>
</html>