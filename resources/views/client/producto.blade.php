@extends('layouts.navbar')
@section('content')
    <h1>Lista de Productos</h1>
    <ul class="product-list">
        @foreach ($productos as $producto)
            <li class="product">
                <img src="{{ $producto->url }}" alt="{{ $producto->Nombre }}">
                <h2>{{ $producto->Nombre }}</h2>
                <p>Precio: ${{ $producto->Precio }}</p>
                <p>Stock: {{ $producto->Stock }}</p>
                <a href="{{ $producto->url }}" class="btn">Ver Detalles</a>
            </li>
        @endforeach
    </ul>
@endsection

@section('css')
    <link rel="stylesheet" href="..\css\producto.css">
@endsection