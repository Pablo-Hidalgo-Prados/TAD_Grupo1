@extends('layout')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<div class="m-4 mt-5">
    <h3 class="text-center">@lang('messages.cart_info_1') {{ $user->name }}</h3>
    @if(count($productos_carrito)>0)
    <div class="d-flex justify-content-center mt-4 mb-4">
        <form action="{{ route('carritos.vaciar') }}" method="POST">
            @csrf
            <button class="btn btn-success ml-2" type="submit">@lang('messages.cart_info_2')</button>
        </form>
    </div>
    <table class="table border-success text-black text-center w-75 mx-auto mt-5">
        <th>@lang('messages.cart_info_3')</th>
        <th class="d-none d-lg-grid">@lang('messages.cart_info_4')</th>
        <th>@lang('messages.cart_info_5')</th>
        <th>@lang('messages.cart_info_6')</th>
        <th>@lang('messages.cart_info_7')</th>
        @foreach ($productos_carrito as $producto)
        <tr>
            <td class="align-middle"><img class="rounded-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $user->nombre }}" width="40" height="40">
                <p>{{ $producto->nombre }}</p>
            </td>
            <td class="d-none d-lg-table-cell align-middle">{{ $producto->descripcion }}</td>
            <td class="align-middle">{{ $producto->precio }}</td>
            <td class="align-middle">{{ $producto->pivot->cantidad }}</td>
            <td class="">
                <form action="{{ route('carritos.reducir') }}" method="post">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <button type="submit" class="btn btn-danger rounded-3 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle mb-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                        </svg>
                    </button>
                </form>
                <form action="{{ route('carritos.incrementar') }}" method="post">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <button type="submit" class="btn btn-success rounded-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mb-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <h3 class="text-center">@lang('messages.cart_info_8') {{ $precio_total }}</h3>
    <div class="d-flex justify-content-center">
        <div class="mt-4 mb-4 ml-4">
            <form action="{{ route('compras.crear') }}" method="POST">
                @csrf
                <!-- Agrega los campos del formulario que contienen los datos necesarios -->
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="productos_carrito" value="{{ json_encode($productos_carrito) }}">
                <input type="hidden" name="precio_total" value="{{ $precio_total }}">
                <label for="direcciones_list">@lang('messages.cart_info_9')</label>
                <select class="form-select" id="direcciones_list" name="direcciones_list">
                    @foreach ($direcciones as $direccion)
                    <option value="{{ $direccion->id }}">{{ $direccion->calle.', '.$direccion->numero }}</option>
                    @endforeach
                </select>
                <label>@lang('messages.cart_info_10')</label>
                <input type="text" name="codigo_descuento" class="form-control mb-3">
                @if($direcciones->count()==0)
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success mt-2" disabled type="submit">@lang('messages.cart_info_11')</button>
                </div>
                @else
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success" type="submit">@lang('messages.cart_info_11')</button>
                </div>
                @endif

            </form>
        </div>
    </div>
    <!-- <div class="d-flex justify-content-center align-items-center">
        <div class="d-inline-block bglogin rounded-4 p-2 mt-5">
            <h2>El carrito está vacío</h2>
        </div>
    </div> -->
    <br>
    <br>
    <br>
    <br>
    @if($direcciones->count()==0)
    <p class="d-flex justify-content-center h4">@lang('messages.cart_info_12')</p>
    <div class="d-flex justify-content-center container">
        <div class="product-card border-success border-opacity-50 mt-5 d-none d-md-flex">
            <form action="{{ route('usuarios.agregardireccion') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="agregar" value="carrito">
                <label>@lang('messages.cart_info_13')</label>
                <input class="form-control mb-3 @error('calle') is-invalid @enderror" type="text" name="calle">
                <label>@lang('messages.cart_info_14')</label>
                <input class="form-control mb-3 @error('ciudad') is-invalid @enderror" type="text" name="ciudad">
                <label>@lang('messages.cart_info_15')</label>
                <input class="form-control mb-3 @error('codigo_postal') is-invalid @enderror" type="text" name="codigo_postal">
                <label>@lang('messages.cart_info_16')</label>
                <input class="form-control mb-3 @error('numero') is-invalid @enderror" type="number" name="numero">
                <label>@lang('messages.cart_info_17')</label>
                <input class="form-control mb-3" type="number" name="planta">
                <label>@lang('messages.cart_info_18')</label>
                <input class="form-control mb-3" type="text" name="puerta">
                <button class="btn btn-success" type="submit">@lang('messages.cart_info_19')</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="product-card border-success border-opacity-50 mt-5 d-block d-md-none">
            <form action="{{ route('usuarios.agregardireccion') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="agregar" value="carrito">
                <label>@lang('messages.cart_info_13')</label>
                <input class="form-control mb-3 @error('calle') is-invalid @enderror" type="text" name="calle">
                <label>@lang('messages.cart_info_14')</label>
                <input class="form-control mb-3 @error('ciudad') is-invalid @enderror" type="text" name="ciudad">
                <label>@lang('messages.cart_info_15')</label>
                <input class="form-control mb-3 @error('codigo_postal') is-invalid @enderror" type="text" name="codigo_postal">
                <label>@lang('messages.cart_info_16')</label>
                <input class="form-control mb-3 @error('numero') is-invalid @enderror" type="number" name="numero">
                <label>@lang('messages.cart_info_17')</label>
                <input class="form-control mb-3" type="number" name="planta">
                <label>@lang('messages.cart_info_18')</label>
                <input class="form-control mb-3" type="text" name="puerta">
                <button class="btn btn-success" type="submit">@lang('messages.cart_info_19')</button>
            </form>
        </div>
    </div>
    @endif
    @else

    <div class="d-flex justify-content-center mt-5 mb-5">
        <p class="text-center h5">@lang('messages.cart_info_20')</p>
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
    </div>
    @endif
</div>
@endsection