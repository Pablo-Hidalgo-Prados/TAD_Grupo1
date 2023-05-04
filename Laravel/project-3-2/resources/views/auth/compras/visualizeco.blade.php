@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center mb-4">@lang('messages.shopping_info_1') {{ $compra->subtotal }}€</h3>
        <p><strong>@lang('messages.shopping_info_2')</strong> {{ $compra->fecha }}</p>
        <p><strong>@lang('messages.shopping_info_3')</strong> {{ $compra->subtotal }}</p>
        <p><strong>@lang('messages.shopping_info_4')</strong> {{ $compra->direccion }}</p>
        <p><strong>@lang('messages.shopping_info_5')</strong> {{ $compra->estado }}</p>
        @foreach ($productos as $producto)
        <div class="col-md-6 col-lg-4">
                <div class="product-card border-success border-opacity-50">
                <p><strong>@lang('messages.shopping_info_6')</strong></p>
                <img class="rounded-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}">
                    <p>@lang('messages.shopping_info_7') {{ $producto->nombre }}</p>
                    <p>@lang('messages.shopping_info_8') {{ $producto->precio }}€</p>
                    <form action="{{ route('productos.visualizar',$producto->id) }}" method="get">
                        @csrf
                        <button class="btn btn-primary ml-1 mt-3" type="submit">@lang('messages.products_info_3')</button>
                    </form>
                </div>
        </div>
        @endforeach
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
@endsection