@extends('layouts.app')
@section('content')

<h1>Registrar Venta</h1>
<br>

@include('partials.alerts')
@include('partials.errors')

<form action="{{ route('ventas.store') }}" method="POST" novalidate>
    @csrf

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-shirt"></i>
        </span>
        <input type="text" name="producto" placeholder="Nombre del producto" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-puzzle-piece"></i>
        </span>
        <input type="number" name="cantidad" placeholder="Cantidad" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-dollar-sign"></i>
        </span>
        <input type="number" name="total" placeholder="Total" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-calendar"></i>
        </span>
        <input type="date" name="fecha" class="form-control">
    </div>

    <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i></button>

</form>

@endsection