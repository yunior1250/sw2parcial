@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('productos.update', $producto->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}">
                        </div>

                        <div class="col-md-6">
                            <label for="precio">precio:</label>
                            <input type="text" name="precio" id="precio" class="form-control" value="{{ $producto->precio }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="stock">stock:</label>
                            <input type="text" name="stock" id="stock" class="form-control" value="{{ $producto->stock }}">
                        </div>
                        {{-- <div class="col-md-6">
                            <label for="Url">Url:</label>
                            <input type="text" name="Url" id="Url" class="form-control" value="{{ $producto->Url }}">
                        </div> --}}
                    </div>
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
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
