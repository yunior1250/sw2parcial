@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')

@stop

@section('content')
<h1>Agregar Inventario</h1>

<form method="POST" action="{{ route('inventarios.store') }}">
    @csrf

    <div class="form-group">
        <label for="Accion">Accion:</label>
        <select name="Accion" id="Accion" class="form-control">            
            <option value="Agregar">Agregar</option>
            <option value="Quitar">Quitar</option>            
        </select>
    </div>

    <div class="form-group">
        <label for="Cantidad">Cantidad:</label>
        <input type="number" name="Cantidad" id="Cantidad" class="form-control">
    </div>

    <div class="form-group">
        <label for="idProducto">Producto:</label>
        <select name="idProducto" id="idProducto" class="form-control">
            @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Agregar Inventario</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
