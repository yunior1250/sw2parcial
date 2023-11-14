@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    
@stop

@section('content')
<h1>Editar Producto</h1>

<form method="POST" action="{{ route('productos.update', $producto->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}">
    </div>

    <div class="form-group">
        <label for="precio">precio:</label>
        <input type="text" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}">
    </div>

    <div class="form-group">
        <label for="stock">stock:</label>
        <input type="text" name="stock" id="stock" class="form-control" value="{{ $producto->stock }}">
    </div>

    <div class="form-group">
        <label for="url">url:</label>
        <input type="text" name="url" id="url" class="form-control" value="{{ $producto->url }}">
    </div>

    <div class="form-group">
        <label for="idCategoria">Categoría:</label>
        <select name="idCategoria" id="idCategoria" class="form-control">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->idCategoria ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>    
    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop