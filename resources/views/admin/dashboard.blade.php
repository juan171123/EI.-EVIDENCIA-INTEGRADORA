<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administrador</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

        <h1>PANEL DE ADMINISTRADOR</h1>
        <br>

         @include('partials.alerts')
        @include('partials.errors')

        <!--Ver y gestionar usuarios del CRUD-->
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary mb-3">
            Gestionar Usuarios <i class="fa-solid fa-users"></i>
        </a>
    @endsection
    
</body>
</html>