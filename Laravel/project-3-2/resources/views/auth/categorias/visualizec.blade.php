@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        <h3 class="text-center mb-4">@lang('messages.category_info_1') {{ $categoria->nombre }}</h3>
        <p><strong>@lang('messages.category_info_2')</strong> {{ $categoria->nombre }}</p>
        <p><strong>@lang('messages.category_info_3')</strong> {{ $categoria->descripcion }}</p>
        <form action="{{ route('categorias.listar') }}" method="POST">
            @csrf
            <button class="btn btn-success" type="submit">@lang('messages.category_info_4')</button>
        </form>
    </div>
</div>
@endsection