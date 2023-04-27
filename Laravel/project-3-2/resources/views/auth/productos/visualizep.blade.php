@extends('layout')

@section('content')
<div class="w-50 border rounded p-3 mx-auto">
    <h3 class="text-center">Visualizando {{ $producto->nombre }}</h3>
    <form action="{{ route('usuarios.volver') }}" method="post">
        @csrf
        <label>Nombre:</label>
        <input class="form-control mb-3" type="text" disabled value="{{ $producto->nombre }}" name="nombre">
        <label>Descripción:</label>
        <input class="form-control mb-3" type="text" disabled value="{{ $producto->descripcion }}" name="descripcion">
        <label>Precio:</label>
        <input class="form-control mb-3" type="email" disabled value="{{ $producto->precio }}" name="precio">
        <label>Stock:</label>
        <input class="form-control mb-3" type="text" disabled value="{{ $producto->stock }}" name="stock">
        <button class="btn btn-success" type="submit">Volver</button>
    </form>

    <div class="d-flex justify-content-center mt-4 mb-4">
        <form action="{{ route('productos.editar',$producto->id) }}" method="get">
            @csrf
            <button class="btn btn-primary ml-1" type="submit">Editar Producto</button>
        </form>
    </div>
</div>
@endsection