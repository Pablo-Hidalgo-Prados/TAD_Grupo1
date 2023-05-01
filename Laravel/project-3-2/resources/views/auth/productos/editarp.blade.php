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

            <h3 class="mt-4 text-center">Agregar categoría</h3>
            <form action="{{ route('productos.agregarcategoria') }}" method="POST">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                <label>Categoría:</label>
                <input class="form-control mb-3 @error('nombre_cat') is-invalid @enderror" type="text" id="nombre_cat" name="nombre_cat">
                <button class="btn btn-success" type="submit">Agregar</button>
            </form>

            <h3 class="mt-4 text-center">Quitar categoría</h3>
            <form action="{{ route('productos.quitarcategoria') }}" method="POST">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <label for="categorias_list">Escoge una categoría:</label>
                <select class="form-select" id="categorias_list" name="categorias_list">
                    @foreach ($producto->categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                
                @if($producto->categorias->count()==0)
                <div class="d-flex">
                    <button class="btn btn-success mt-2" disabled type="submit">Quitar</button>
                </div>
                @else
                <div class="d-flex">
                    <button class="btn btn-success mt-2" type="submit">Quitar</button>
                </div>
                @endif
            </form>
            <form action="{{ route('productos.volver') }}" method="post">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <button class="btn btn-success mt-2" type="submit">Volver</button>
            </form>
        </div>
        @endsection