@extends('layoutcart')
@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="my-4">
    @if (isset($productos))
    <h1 class="text-center mb-5">@lang('messages.favourites_info_1')</h1>
    <div class="d-flex justify-content-center mt-4 mb-4">
        {{ $productos->links() }}
    </div>

    <div class="container">
        <div class="row">
            @if($productos->count()<=0)
                <p class="text-center">@lang('messages.favourites_info_2')</p>
            @endif
            @foreach ($productos as $producto)
            <div class="col-md-6 col-lg-4">
                <div class="product-card border-success border-opacity-50">
                    <img class="rounded-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}">
                    <h5>{{ $producto->nombre }}</h5>
                    <p>${{ $producto->precio }}</p>

                    <form action="{{ route('usuarios.quitarfavoritos') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                        <input type="hidden" value="{{ $producto->id }}" name="producto_id">
                        <input type="hidden" value="favoritos" name="ruta">
                        <button class="btn btn-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        </button>
                    </form>
                    
                    @if(Auth::user()->rol!='admin')
                        <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}" method="POST">
                            @csrf
                            <button class="btn btn-success mt-3" type="submit">@lang('messages.favourites_info_3')</button>
                        </form>
                    @endif
                    <form action="{{ route('productos.visualizar',$producto->id) }}" method="get">
                        @csrf
                        <button class="btn btn-success ml-1 mt-3" type="submit">@lang('messages.favourites_info_4')</button>
                    </form>
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