<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1>REGISTRO</h1>

    <form action="{{ route('registro.store') }}" method="POST">
        @csrf 
        <input type="text" name="name" placeholder="Nombre" class="form-control" required>
        <br>
        <input type="email" name="email" placeholder="Correo" class="form-control" required>
        <br>
        <input type="text" name="phone" placeholder="Telefono" class="form-control" required>
        <br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br>
        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="form-control" required>
        <br>

        @if(auth()->check() && auth()->user()->is_admin)
            <div class="form-check"> 
                <input type="checkbox" name="is_admin" value="1" id="is_admin">
                <label for="is_admin">Es administrador</label>
            </div>
            <br>
        @endif

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>
    </form>
    @endsection
</body>
</html>