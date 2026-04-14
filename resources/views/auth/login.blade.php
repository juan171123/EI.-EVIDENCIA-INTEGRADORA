<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    
    <h1>INICIO DE SESIÓN</h1>
    <br>

    @include('partials.errors')

    <form action="{{ route('acceso.store') }}" method="POST">
        @csrf 
         <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
            <i class="fa-solid fa-user-tie"></i>
            </span>
            <input type="email" name="email" placeholder="Correo" class="form-control" required>
        </div>

         <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
            <i class="fa-solid fa-key"></i>
            </span>
            <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Enviar</button>
    </form>
    @endsection
    
</body>
</html>