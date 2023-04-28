@extends('layout')

@section('content')
<div class="w-50 border rounded p-3 mx-auto">
    <h3 class="text-center mb-4">Visualizando {{ $producto->nombre }}</h3>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $producto->precio }}</p>
    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
    <form action="{{ route('usuarios.volver') }}" method="post">
        @csrf
        <button class="btn btn-success" type="submit">Volver</button>
    </form>

    @if(Auth::user()->rol=='admin')
        <div class="d-flex justify-content-center mt-4 mb-4">
            <form action="{{ route('productos.editar',$producto->id) }}" method="get">
                @csrf
                <button class="btn btn-primary ml-1" type="submit">Editar Producto</button>
            </form>
        </div>
    @elseif(Auth::user()->rol=='cliente')
        <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}" method="POST">
            @csrf
            <button class="btn btn-primary mt-3" type="submit">Añadir al carrito</button>
        </form>
    @endif
</div>
@endsection