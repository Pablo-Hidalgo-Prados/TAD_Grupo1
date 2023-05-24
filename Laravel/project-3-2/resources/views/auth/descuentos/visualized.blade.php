@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        <h3 class="text-center mb-4">@lang('messages.discount_info_1') {{ $descuento->codigo }}</h3>
        <p><strong>@lang('messages.discount_info_2')</strong> {{ $descuento->codigo }}</p>
        <p><strong>@lang('messages.discount_info_3')</strong> {{ $descuento->porcentaje }}</p>
        <form action="{{ route('descuentos.listar') }}" method="POST">
            @csrf
            <button class="btn btn-success" type="submit">@lang('messages.discount_info_4')</button>
        </form>
    </div>
</div>
@endsection