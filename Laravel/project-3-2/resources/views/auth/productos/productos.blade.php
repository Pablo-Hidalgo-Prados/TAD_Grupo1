@extends('layout')
@section('content')
<div class="my-4">
    @if(isset(Auth::user()->id))
    <div class="d-flex justify-content-center mt-4 mb-4">

        <form action="{{ route('carritos.visualizar', Auth::user()->id) }}" method="get">
            @csrf
            <button type="submit" class="btn btnbg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                </svg>
                Ver Carrito
            </button>
        </form>
    </div>
    @endif
    @if (isset($productos))
    <h1 class="text-center mb-5">Productos</h1>

    <div class="d-flex justify-content-center mt-4 mb-4">
        {{ $productos->links() }}
    </div>

    <div class="container">
        <div class="row">
            @foreach ($productos as $producto)
            <div class="col-md-6 col-lg-4">
                <div class="product-card">
                    <img class="rounded-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}">
                    <h5>{{ $producto->nombre }}</h5>
                    <p>${{ $producto->precio }}</p>

                    @if(isset(Auth::user()->id))
                    <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Añadir al carrito</button>
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