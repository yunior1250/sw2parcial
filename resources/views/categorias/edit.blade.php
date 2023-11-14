@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
           {{--  <h5 class="card-title">Editar Categoría</h5> --}}
            <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
