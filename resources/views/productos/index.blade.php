@extends('adminlte::page')

@section('title', 'Producto Listado')

@section('content_header')
    <h1>Listado De Producto</h1>
@stop

@section('content')
    {{-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">Gestión de Productos</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Lista de Productos</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>precio</th>
                        <th>stock</th>
                        <th>url</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td><img src="{{ $producto->url }}" alt="" width="200" height="100"></td>
                            <td>{{ $producto->categoria->nombre }}</td>
                            <td>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                                <form method="POST" action="{{ route('productos.destroy', $producto->id) }}"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    <ul class="product-list" id="productList">
        @foreach ($productos as $producto)
            <li class="product" data-categoria="{{ $producto->idCategoria }}">
                <div class="product-image">
                    <img src="{{ $producto->url }}" alt="{{ $producto->nombre }}">
                </div>
                <h2 class="product-title">{{ $producto->nombre }}</h2>
                <div class="product-info">
                    <p class="product-price">{{ $producto->precio }} Bs</p>
                    <p class="product-stock">stock: {{ $producto->stock }}</p>
                    {{-- <input type="number" class="quantity-input" min="1" max="{{ $producto->stock }}">
                    <button class="add-to-cart" data-producto="{{ $producto }}">Agregar al Carrito</button> --}}
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                    <form method="POST" action="{{ route('productos.destroy', $producto->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="..\css\producto.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
