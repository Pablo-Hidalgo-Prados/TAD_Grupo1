@extends('layout')

@section('content')
<div class="d-flex justify-content-center mt-5 mb-4">
    <div class="container">
        <h3 class="text-center mb-4">Visualizando {{ $producto->nombre }}</h3>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="product-card border-success border-opacity-50">
                    <img class="rounded-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}">
                    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
                    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                    <p><strong>Precio:</strong> {{ $producto->precio }}</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                    <p><strong>Categorías:</strong></p>
                    @foreach ($producto->categorias as $categoria)
                        <div class="col-md-6 col-lg-4">
                            <p>- {{ $categoria->nombre }}</p>
                        </div>
                    @endforeach
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
                <form action="{{ route('usuarios.volver') }}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit">Volver</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection