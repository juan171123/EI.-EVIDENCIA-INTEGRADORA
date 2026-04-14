@extends('layouts.app')
@section('content')

<h1>Registrar Producto</h1>
<br>

@include('partials.alerts')
@include('partials.errors')

<form action="{{route('productos.store')}}" method="POST" novalidate>
    @csrf

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-bag-shopping"></i>
        </span>
        <input type="text" name="nombre" placeholder="Nombre o tipo de Producto" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-puzzle-piece"></i>
        </span>
        <input type="number" name="cantidad" placeholder="Cantidad (Pzas)" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-layer-group"></i>
        </span>
        <input type="text" name="categoria" placeholder="Categoria (Ropa,Accesorios,Electrónica,etc)" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-percent"></i>
        </span>
        <input type="number" name="descuento" placeholder="Descuento" class="form-control">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-dollar-sign"></i>
        </span>
        <input type="number" name="precio" placeholder="Precio" class="form-control">
    </div>

    <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i></button>
</form>
@endsection