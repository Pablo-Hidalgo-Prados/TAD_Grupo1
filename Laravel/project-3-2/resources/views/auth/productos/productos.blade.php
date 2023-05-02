@extends('layout')
@section('content')
<div class="my-4">
    @if (isset($productos))
    @if (isset($categorias))
    <div class="w-25 mx-auto">
    <form action="{{ route('productos.filtrarcategoria') }}" method="POST">
        @csrf
        <label for="categorias_list text-center">Escoge una categoría:</label>
        <select class="form-select mb-3" id="categorias_list" name="categorias_list">
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
        <button class="btn btn-success mb-3" type="submit">Filtrar</button>
    </form>
    <form action="{{ route('productos.buscar') }}" method="POST">
        @csrf
        <label>Nombre producto:</label>
        <input class="form-control mb-3 @error('nombre_producto') is-invalid @enderror" type="text" value="" name="nombre_producto">
        <button class="btn btn-success mb-3" type="submit">Buscar</button>
    </form>
    </div>
    @else
    <form action="{{ route('productos.borrarfiltro') }}" method="POST">
        @csrf
        <button class="btn btn-success m-3" type="submit">Ver listado completo</button>
    </form>
    @endif
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
                        @php
                            $enc = false;
                        @endphp
                        @foreach(Auth::user()->productos as $favorito)
                            @if($favorito->id == $producto->id)
                                @php $enc = true; @endphp
                                @break
                            @endif
                        @endforeach

                        @if(!$enc)
                            <form action="{{ route('usuarios.agregarfavoritos') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $producto->id }}" name="producto_id">
                                <button class="btn btn-success" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('usuarios.quitarfavoritos') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $producto->id }}" name="producto_id">
                                <button class="btn btn-success" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                </button>
                            </form>
                        @endif
                    
                    <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-success mt-3" type="submit">Añadir al carrito</button>
                    </form>
                    <form action="{{ route('productos.visualizar',$producto->id) }}" method="get">
                        @csrf
                        <button class="btn btn-success ml-1 mt-3" type="submit">Ver Producto</button>
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