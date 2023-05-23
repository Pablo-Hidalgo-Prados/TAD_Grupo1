@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-2 mx-2 mb-2">
        <h3 class="text-center mb-5">@lang('messages.shopping_info_1') {{ $compra->subtotal }}€</h3>
        <p><strong>@lang('messages.shopping_info_2')</strong> {{ $compra->fecha }}</p>
        <p><strong>@lang('messages.shopping_info_3')</strong> {{ $compra->subtotal }}</p>
        <p><strong>@lang('messages.shopping_info_4')</strong> {{ $compra->direccion }}</p>
        <p><strong>@lang('messages.shopping_info_5')</strong> {{ $compra->estado }}</p>

        <div class="row justify-content-center mt-5">
            @php $cantidades = [];
            for ($i = 0; $i < count($productos); $i++) {
                $producto = $productos[$i];
                $productoId = $producto->id;
                
                if (isset($cantidades[$productoId])) {
                    $cantidades[$productoId]++;
                } else {
                    $cantidades[$productoId] = 1;
                }
            }
            $c_producto=$cantidades;
            @endphp
            @php $count = 0; @endphp
            @foreach ($productos as $producto)
            @if($cantidades[$producto->id]>1)
                @php $cantidades[$producto->id]--; @endphp
            @else
            @php $count++; @endphp
            <div class="col-auto mb-4 mx-auto">
                <div class="card h-100 bg-light border-success" style="border-radius: 30px;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <a href="{{ route('productos.visualizar', $producto->id) }}" class="m-2 mt-3">
                            <img class="img-fluid m-2 mt-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}" style="border-radius: 30px;">
                        </a>
                        <div>
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            @if($c_producto[$producto->id]>1)
                            <p class="card-text">Precio (x{{ $c_producto[$producto->id] }}): ${{$c_producto[$producto->id]*$producto->precio}}</p>
                            <p class="card-text">Precio individual: ${{ $producto->precio }}</p>
                            @else
                            <p class="card-text">${{ $producto->precio }}</p>
                            @endif
                            <p class="card-text">Cantidad: {{ $c_producto[$producto->id] }}</p>
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
                            <form action="{{ route('productos.visualizar',$producto->id) }}" method="get">
                                @csrf
                                <button class="btn btn-success mt-2 rounded-4" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <form action="{{ route('compras.editar', $compra->id) }}" method="get">
            @csrf
            <input type="hidden" name="compra_id" value="{{ $compra->id }}">
            @if(Auth::user()->rol=='admin')
            <button class="btn btn-primary ml-1 mt-3" type="submit">@lang('messages.shopping_info_9')</button>
            @endif
        </form>
        <form action="{{ route('compras.volver') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $compra->user_id }}" name="user_id">
            <button class="btn btn-success mt-3" type="submit">@lang('messages.shopping_info_10')</button>
        </form>
    </div>
</div>
@endsection