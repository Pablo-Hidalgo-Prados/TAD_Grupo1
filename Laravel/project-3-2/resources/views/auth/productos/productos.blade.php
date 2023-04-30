@extends('layout')
@section('content')
<div class="my-4">
    @if (isset($productos))
    <h1 class="text-center mb-5">Productos</h1>

    <div class="d-flex justify-content-center mt-4 mb-4">
        {{ $productos->links() }}
    </div>

    <div class="container">
        <div class="row">
            @foreach ($productos as $producto)
            <div class="col-md-6 col-lg-4">
                <div class="product-card border-success border-opacity-50">
                    <img class="rounded-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}">
                    <h5>{{ $producto->nombre }}</h5>
                    <p>${{ $producto->precio }}</p>

                    @if(isset(Auth::user()->id))
                    <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Añadir al carrito</button>
                    </form>
                    <form action="{{ route('productos.visualizar',$producto->id) }}" method="get">
                        @csrf
                        <button class="btn btn-primary ml-1 mt-3" type="submit">Ver Producto</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $productos->links() }}
        </div>

    </div>
    @endif
</div>
@endsection