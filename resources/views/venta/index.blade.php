@extends('layouts.app')
@section('content')
<h1>VENTAS REGISTRADAS</h1>

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('ventas.create') }}">
        <button class="btn btn-success me-3"><i class="fa-solid fa-plus"></i></button>
    </a>

    <form action="{{ route('cerrar') }}" method='POST'>
        @csrf 
        <button class="btn btn-danger me-3"><i class="fa-solid fa-arrow-left"></i> Cerrar sesion</button>
    </form>

    @if(auth()->user()->is_admin)
        <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">
            Admin <i class="fa-solid fa-users-gear"></i>
        </a>
    @endif
</div>

@include('partials.alerts')
@include('partials.errors')

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>PRODUCTO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
            <th>FECHA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->producto }}</td>
                <td>{{ $venta->cantidad }}</td>
                <td>{{ $venta->total }}</td>
                <td>{{ $venta->fecha }}</td>
                <td>
                    <a href="{{ route('ventas.edit', $venta) }}">
                        <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                    </a>

                    <form action="{{ route('ventas.destroy', $venta) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar la venta?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection