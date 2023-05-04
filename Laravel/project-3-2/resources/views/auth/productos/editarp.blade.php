@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">

<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        @error('nombre')
        <div class="alert alert-danger"> @lang('messages.product_edit_error_1') </div>
        @enderror
        @error('descripcion')
        <div class="alert alert-danger"> @lang('messages.product_edit_error_2') </div>
        @enderror
        @error('precio')
        <div class="alert alert-danger"> @lang('messages.product_edit_error_3') </div>
        @enderror
        @error('stock')
        <div class="alert alert-danger"> @lang('messages.product_edit_error_4') </div>
        @enderror
        <h3 class="text-center">@lang('messages.product_edit_info_1') {{ $producto->nombre }}</h3>
        <form action="{{ route('productos.actualizar',$producto->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label>@lang('messages.product_edit_info_2')</label>
            <input class="form-control mb-3" type="text" value="{{ $producto->nombre }}" name="nombre">
            <label>@lang('messages.product_edit_info_3')</label>
            <input class="form-control mb-3" type="text" value="{{ $producto->descripcion }}" name="descripcion">
            <label>@lang('messages.product_edit_info_4')</label>
            <input class="form-control mb-3" type="number" value="{{ $producto->precio }}" name="precio">
            <label>@lang('messages.product_edit_info_5')</label>
            <input class="form-control mb-3" type="number" value="{{ $producto->stock }}" name="stock">
            <button class="btn btn-success mb-4" type="submit">@lang('messages.product_edit_info_6')</button>
        </form>

        <h3 class="mt-4 text-center">@lang('messages.product_edit_info_7')</h3>
        <form action="{{ route('productos.imagen') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
            <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
            <label>@lang('messages.product_edit_info_16')</label>
            <input class="form-control mb-3 @error('imagen') is-invalid @enderror" type="file" id="imagen" name="imagen">
            <button class="btn btn-success" type="submit">@lang('messages.product_edit_info_7')</button>
        </form>

        <h3 class="mt-4 text-center">@lang('messages.product_edit_info_8')</h3>
        <form action="{{ route('productos.agregarcategoria') }}" method="POST">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
            <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
            <label>@lang('messages.product_edit_info_10')</label>
            <input class="form-control mb-3 @error('nombre_cat') is-invalid @enderror" type="text" id="nombre_cat" name="nombre_cat">
            <button class="btn btn-success" type="submit">@lang('messages.product_edit_info_11')</button>
        </form>

        <h3 class="mt-4 text-center">@lang('messages.product_edit_info_12')</h3>
        <form action="{{ route('productos.quitarcategoria') }}" method="POST">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
            <label for="categorias_list">@lang('messages.product_edit_info_13')</label>
            <select class="form-select" id="categorias_list" name="categorias_list">
                @foreach ($producto->categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>

            @if($producto->categorias->count()==0)
            <div class="d-flex">
                <button class="btn btn-success mt-2" disabled type="submit">@lang('messages.product_edit_info_14')</button>
            </div>
            @else
            <div class="d-flex">
                <button class="btn btn-success mt-2" type="submit">@lang('messages.product_edit_info_14')</button>
            </div>
            @endif
        </form>
        <form action="{{ route('productos.volver') }}" method="post">
            @csrf
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
            <button class="btn btn-success mt-2" type="submit">@lang('messages.product_edit_info_15')</button>
        </form>
    </div>
</div>
@endsection