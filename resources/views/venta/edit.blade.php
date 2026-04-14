@extends('layouts.app')
@section('content')

<h1>EDITAR VENTA: {{ $venta->producto }}</h1>

@include('partials.alerts')
@include('partials.errors')

<form action="{{ route('ventas.update', $venta) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-shirt"></i>
        </span>
        <input type="text" name="producto" value="{{ $venta->producto }}" placeholder="Nombre del producto" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-puzzle-piece"></i>
        </span>
        <input type="number" name="cantidad" value="{{ $venta->cantidad }}" placeholder="Cantidad" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-dollar-sign"></i>
        </span>
        <input type="number" name="total" value="{{ $venta->total }}" placeholder="Total" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-calendar"></i>
        </span>
        <input type="date" name="fecha" value="{{ $venta->fecha }}" class="form-control">
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-pen-to-square"></i> Guardar
        </button>

        <a href="{{ route('ventas.index') }}">
            <button class="btn btn-danger">
                <i class="fa-solid fa-arrow-rotate-right"></i> Volver
            </button>
        </a>
    </div>

</form>

@endsection