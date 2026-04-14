@extends('layouts.app')

@section('content')

<h1>Registro de Usuarios</h1>
<br>

@include('partials.alerts')
@include('partials.errors')

<form action="{{ route('usuarios.store') }}" method="POST" novalidate>
    @csrf

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-user"></i>
        </span>
        <input type="text" name="name" placeholder="Nombre completo" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-phone"></i>
        </span>
        <input type="text" name="phone" placeholder="Número de teléfono" class="form-control" value="{{ old('phone') }}">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-envelope"></i>
        </span>
        <input type="email" name="email" placeholder="Correo electrónico" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">
            <i class="fa-solid fa-key"></i>
        </span>
        <input type="password" name="password" placeholder="Contraseña" class="form-control">
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="is_admin" value="1" id="is_admin"
            {{ old('is_admin') ? 'checked' : '' }}>
        <label class="form-check-label" for="is_admin">Es administrador</label>
    </div>

    <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

</form>

@endsection