@extends('layouts.navbar')
@section('content')
    <h1>Lista de Productos</h1>
    <select id="categoriaSelect" class="custom-select">
        <option value="todas">Todas las categorías</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->Nombre }}</option>
        @endforeach
    </select>
    

    {{-- <ul class="product-list" id="productList">
        @foreach ($productos as $producto)
            <li class="product" data-categoria="{{ $producto->idCategoria }}" >
                <div class="product-image">
                    <img src="{{ $producto->Url }}" alt="{{ $producto->Nombre }}">
                </div>
                <h2 class="product-title">{{ $producto->Nombre }}</h2>
                <div class="product-info">
                    <p class="product-price">{{ $producto->Precio }} Bs</p>
                    <p class="product-stock">Stock: {{ $producto->Stock }}</p>
                </div>  
                <button class="add-to-cart" data-producto="{{ $producto }}">Agregar al Carrito</button>          
            </li>
        @endforeach
    </ul> --}}

    <ul class="product-list" id="productList">
        @foreach ($productos as $producto)
            <li class="product" data-categoria="{{ $producto->idCategoria }}">
                <div class="product-image">
                    <img src="{{ $producto->Url }}" alt="{{ $producto->Nombre }}">
                </div>
                <h2 class="product-title">{{ $producto->Nombre }}</h2>
                <div class="product-info">
                    <p class="product-price">{{ $producto->Precio }} Bs</p>
                    <p class="product-stock">Stock: {{ $producto->Stock }}</p>
                    <input type="number" class="quantity-input" min="1" max="{{ $producto->Stock }}">
                    <button class="add-to-cart" data-producto="{{ $producto }}">Agregar al Carrito</button>          
                </div>
            </li>
        @endforeach
    </ul>
    
    
    <div class="cart">
        <h1>Carrito de Compras</h1>
        <ul class="cart-list" id="cartList">
            <!-- Los productos seleccionados se agregarán aquí dinámicamente -->
        </ul>
        <div class="cart-total">
            <p>Total: <span id="cartTotal">0.00</span> Bs</p>
            <button id="checkoutButton" class="btn" >Realizar Compra</button>
        </div>
    </div>
    
    <script src="..\js\producto.js">    
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="..\css\producto.css">
@endsection
