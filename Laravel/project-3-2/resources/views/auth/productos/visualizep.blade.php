@extends('layout')

@section('content')
    <div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center">Visualizando a {{ $producto->nombre }}</h3>
        <form action="{{ route('productos.listar') }}" method="POST">
            @csrf
            <label>Nombre:</label>
            <input class="form-control mb-3" type="text" disabled value="{{ $producto->nombre }}" name="nombre">
            <label>Apellidos:</label>
            <input class="form-control mb-3" type="text" disabled value="{{ $producto->descripcion }}" name="descripcion">
            <label>Precio:</label>
            <input class="form-control mb-3" type="number" disabled value="{{ $producto->precio }}" name="precio">
            <label>Stock:</label>
            <input class="form-control mb-3" type="number" disabled value="{{ $producto->stock }}" name="stock">
            <button class="btn btn-success" type="submit">Volver</button>
        </form>
    </div>
@endsection
