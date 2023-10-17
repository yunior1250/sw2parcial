@extends('adminlte::page')

@section('title', 'Listado De Categorias ')

@section('content_header')
    <h1>Listado De Categorias</h1>
@stop

@section('content')
    <h1>Crear Categoría</h1>

    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="Nombre" id="nombre" class="form-control" value="{{ old('Nombre') }}">
            @error('Nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear Categoría</button>
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
