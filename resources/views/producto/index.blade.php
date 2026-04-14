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

    <h1>PRODUCTOS REGISTRADOS</h1>

    <div class="d-flex justify-content-end mb-2">

        <a href="{{ route('productos.create') }}">
        <button class="btn btn-success me-3"><i class="fa-solid fa-plus"></i></button>
        </a>

        <a href="{{ route('ventas.index') }}">
        <button class="btn btn-info me-3"><i class="fa-solid fa-receipt"></i> Ventas</button>
        </a>

        <a href="{{ route('home') }}">
        <button class="btn btn-primary me-3"><i class="fa-solid fa-store"></i> Ver Catálogo</button>
        </a>

        <form action=" {{ route('cerrar') }}" method='POST'>
            @csrf 
            <button class="btn btn-danger me-3"> <i class="fa-solid fa-arrow-left"></i> Cerrar sesión</button>

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
                <th>CANTIDAD</th>
                <th>CATEGORIA</th>
                <th>DESCUENTO</th>
                <th>PRECIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <TBody>
            <!-- usar blade para recorrer los registros -->
            @foreach ($productos as $producto)
                <tr>
                    <!-- variableCiclo->campoBD -->
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->categoria }}</td>
                    <td>{{ $producto->descuento }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')
                            <BUTton 
                            class="btn btn-danger"
                            onclick="return confirm('¿Eliminar el registro?')">
                            <i class="fa-solid fa-trash"></i></BUTton>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </TBody>

    </table>

    @endsection
    
</body>
</html>