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
    <h1>EDITAR PRODUCTO: {{ $producto->nombre }}</h1>

    @include('partials.alerts')
    @include('partials.errors')

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-bag-shopping"></i>
            </span>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" placeholder="Nombre" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-puzzle-piece"></i>
            </span>
            <input type="number" name="cantidad" value="{{ $producto->cantidad }}" placeholder="Cantidad" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-layer-group"></i>
            </span>
            <input type="text" name="categoria" value="{{ $producto->categoria }}" placeholder="Categoria (Ropa,Accesorios,Electrónica,etc)" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-percent"></i>
            </span>
            <input type="number" name="descuento" value="{{ $producto->descuento }}" placeholder="Descuento" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa-solid fa-dollar-sign"></i>
            </span>
            <input type="number" name="precio" value="{{ $producto->precio }}" placeholder="Precio" class="form-control">
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-pen-to-square"></i> Guardar
            </button>

            <a href="{{ route('productos.index') }}">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-arrow-rotate-right"></i> Volver
                </button>
            </a>
        </div>

    </form>

    @endsection
</body>
</html>