@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="precio">precio:</label>
                            <input type="text" name="precio" id="precio" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="stock">stock:</label>
                            <input type="text" name="stock" id="stock" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="url">Subir Imagen:</label>
                            <input type="file" name="url" id="url" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="idCategoria">Categoría:</label>
                    <select name="idCategoria" id="idCategoria" class="form-control">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Crear Producto</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('¡Hola!');
    </script>
@stop
