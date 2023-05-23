@extends('layout')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div class="my-4">
    @if (isset($productos))
    @if (isset($categorias))

    <div class="d-flex justify-content-center container">

        <div class="product-card border-success border-opacity-50 mt-1 me-2 d-block d-lg-none">
            <form action="{{ route('productos.filtrarcategoria') }}" method="POST">
                @csrf
                <label for="categorias_list text-center">@lang('messages.products_info_4')</label>
                <select class="form-select mb-3 input-small2" id="categorias_list" name="categorias_list">
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <button class="btn btn-success mb-3" type="submit">@lang('messages.products_btn_1')</button>
            </form>
        </div>
        <div class="product-card border-success border-opacity-50 mt-1 ml-2 d-block d-lg-none">
            <form action="{{ route('productos.buscar') }}" method="POST">
                @csrf
                <label>@lang('messages.products_info_5')</label>
                <input class="form-control mb-3 @error('nombre_producto') is-invalid @enderror input-small3" type="text" value="" name="nombre_producto">
                <button class="btn btn-success mb-3" type="submit">@lang('messages.products_btn_2')</button>
            </form>
        </div>
    </div>

    <div class="d-flex justify-content-center container">
        <div class="product-card border-success border-opacity-50 mt-1 me-2 d-none d-lg-flex">
            <form action="{{ route('productos.filtrarcategoria') }}" method="POST">
                @csrf
                <label for="categorias_list text-center">@lang('messages.products_info_4')</label>
                <select class="form-select mb-3 input-small" id="categorias_list" name="categorias_list">
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <button class="btn btn-success mb-3" type="submit">@lang('messages.products_btn_1')</button>
            </form>
        </div>
        <div class="product-card border-success border-opacity-50 mt-1 ml-2 d-none d-lg-flex">
            <form action="{{ route('productos.buscar') }}" method="POST">
                @csrf
                <label>@lang('messages.products_info_5')</label>
                <input class="form-control mb-3 @error('nombre_producto') is-invalid @enderror input-small" type="text" value="" name="nombre_producto">
                <button class="btn btn-success mb-3" type="submit">@lang('messages.products_btn_2')</button>
            </form>
        </div>
    </div>
    @else
    <div class="d-flex justify-content-center">
        <form action="{{ route('productos.vista') }}" method="get">
            @csrf
            <button class="btn btn-success m-3" type="submit">Ver listado completo</button>
        </form>
    </div>
    @endif
    <h1 class="text-center mb-5">@lang('messages.products_info_1')</h1>
    @endif
</div>

<div class="d-flex justify-content-center mt-4 mb-4">
    {{ $productos->links() }}
</div>

<div class="container">
    <div class="row justify-content-center">
        @php $count = 0; @endphp
        @foreach ($productos as $producto)
        @php $count++; @endphp
        <div class="col-auto mb-4 mx-auto cards">
            <div class="card h-100 bg-light border-success" style="border-radius: 30px;">
                <img class="img-fluid m-2 mt-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}" style="border-radius: 30px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">${{ $producto->precio }}</p>
                    </div>
                    @if (isset(Auth::user()->id))
                    @php
                    $enc = false;
                    @endphp
                    @foreach (Auth::user()->productos as $favorito)
                    @if ($favorito->id == $producto->id)
                    @php $enc = true; @endphp
                    @break
                    @endif
                    @endforeach
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}" method="POST">
                            @csrf
                            @if (!isset($categorias) || isset($buscar))
                            <input type="hidden" value="buscar" name="ruta">
                            @endif
                            <button class="btn btn-success mt-2 rounded-4" type="submit">@lang('messages.products_info_2')</button>
                        </form>
                        <div class="float-right d-flex justify-content-end">
                        @if (!$enc)
                        <form action="{{ route('usuarios.agregarfavoritos') }}" class="mx-1" method="POST">
                            @csrf
                            @if (!isset($categorias) || isset($buscar))
                            <input type="hidden" value="buscar" name="ruta">
                            @endif
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <input type="hidden" value="{{ $producto->id }}" name="producto_id">
                            <button class="rounded-4 btn btn-success mt-2" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star mb-1" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 .163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                </svg>
                            </button>
                        </form>
                        @else
                        <form action="{{ route('usuarios.quitarfavoritos') }}" class="mx-1" method="POST">
                            @csrf
                            @if (!isset($categorias) || isset($buscar))
                            <input type="hidden" value="buscar" name="ruta">
                            @endif
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <input type="hidden" value="{{ $producto->id }}" name="producto_id">
                            <button class="rounded-4 btn btn-success mt-2" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill mb-1" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('productos.visualizar',$producto->id) }}" method="get">
                            @csrf
                            <button class="btn btn-success mt-2 rounded-4" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </button>
                        </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection