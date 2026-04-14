<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
</head>
<body>

    @extends('layouts.app')
    @section('content')

    <h1>CATALOGO DE PRODUCTOS</h1>
    <br>

    <div style="display:flex; flex-wrap:wrap; gap:20px;">
        @foreach($productos as $producto) 
            <div style="width:200px; padding:10px; border:1px solid #ddd; border-radius:8px;">
                
                @if(isset($producto['thumbnail'])) 
                    <img src="{{ $producto['thumbnail'] }}" style="width:100%; height:auto;">
                @endif
            
                <h3>{{ $producto['title'] }}</h3>
                <p><strong>${{ $producto['price'] }}</strong></p>
                <p>{{ $producto['category'] }}</p>
            </div>
        @endforeach
    </div>
    @endsection

</body>
</html>