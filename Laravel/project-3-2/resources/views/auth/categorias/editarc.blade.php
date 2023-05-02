@extends('layout')

@section('content')
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        @error('nombre')
        <div class="alert alert-danger"> Debe rellenar el nombre </div>
        @enderror
        @error('descripcion')
        <div class="alert alert-danger"> Debe rellenar la descripcion </div>
        @enderror
        <h3 class="text-center">Editar a {{ $categoria->nombre }}</h3>
        <form action="{{ route('categorias.actualizar',$categoria->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label>Nombre:</label>
            <input class="form-control mb-3" type="text" value="{{ $categoria->nombre }}" name="nombre">
            <label>Descripción:</label>
            <input class="form-control mb-3" type="text" value="{{ $categoria->descripcion }}" name="descripcion">
            <button class="btn btn-success" type="submit">Actualizar</button>
        </form>
    </div>
</div>
@endsection