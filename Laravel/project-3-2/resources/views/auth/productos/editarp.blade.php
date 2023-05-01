@extends('layout')

@section('content')

        <div class="w-50 border rounded p-3 mx-auto">
            @error('nombre')
            <div class="alert alert-danger"> Debe rellenar el nombre </div>
            @enderror
            @error('descripcion')
            <div class="alert alert-danger"> Debe rellenar la descripcion </div>
            @enderror
            @error('precio')
            <div class="alert alert-danger"> Debe rellenar el precio </div>
            @enderror
            @error('stock')
            <div class="alert alert-danger"> Debe rellenar el stock </div>
            @enderror
            <h3 class="text-center">Editar a {{ $producto->nombre }}</h3>
            <form action="{{ route('productos.actualizar',$producto->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label>Nombre:</label>
                <input class="form-control mb-3" type="text" value="{{ $producto->nombre }}" name="nombre">
                <label>Descripción:</label>
                <input class="form-control mb-3" type="text" value="{{ $producto->descripcion }}" name="descripcion">
                <label>Precio:</label>
                <input class="form-control mb-3" type="number" value="{{ $producto->precio }}" name="precio">
                <label>Stock:</label>
                <input class="form-control mb-3" type="number" value="{{ $producto->stock }}" name="stock">
                <button class="btn btn-success mb-4" type="submit">Actualizar</button>
            </form>

            <h3 class="mt-4 text-center">Actualizar imagen</h3>
            <form action="{{ route('productos.imagen') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                <label>Imagen:</label>
                <input class="form-control mb-3 @error('imagen') is-invalid @enderror" type="file" id="imagen" name="imagen">
                <button class="btn btn-success" type="submit">Actualizar imagen</button>
            </form>

        </div>
        @endsection