@extends('adminlte::page')

@section('title', 'Listado De Categorias ')

@section('content_header')
    <h1>Listado De Categorias</h1>
@stop

@section('content')
    <h1>Editar Categoría</h1>

    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $categoria->Nombre }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
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
