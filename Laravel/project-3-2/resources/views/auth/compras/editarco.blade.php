@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        @error('fecha')
        <div class="alert alert-danger"> @lang('messages.shopping_edit_error_1') </div>
        @enderror
        @error('subtotal')
        <div class="alert alert-danger"> @lang('messages.shopping_edit_error_2') </div>
        @enderror
        @error('direccion')
        <div class="alert alert-danger"> @lang('messages.shopping_edit_error_3') </div>
        @enderror
        @error('estado')
        <div class="alert alert-danger"> @lang('messages.shopping_edit_error_4') </div>
        @enderror
        <h3 class="text-center">@lang('messages.shopping_edit_info_1') {{ $compra->subtotal }}@lang('messages.shopping_edit_info_2')</h3>
        <form action="{{ route('compras.actualizar',$compra->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label>@lang('messages.shopping_info_2')</label>
            <input class="form-control mb-3" type="text" value="{{ $compra->fecha }}" name="fecha">
            <label>@lang('messages.shopping_info_3')</label>
            <input class="form-control mb-3" type="text" value="{{ $compra->subtotal }}" name="subtotal">
            <label>@lang('messages.shopping_info_4')</label>
            <input class="form-control mb-3" type="text" value="{{ $compra->direccion }}" name="direccion">
            <label>@lang('messages.shopping_info_5')</label>
            <select class="form-select mb-3" name="estado">
                <option value="En preparación" {{ $compra->estado == "En preparación" ? "selected" : "" }}>@lang('messages.shopping_edit_info_3')</option>
                <option value="Preparado" {{ $compra->estado == "Preparado" ? "selected" : "" }}>@lang('messages.shopping_edit_info_4')</option>
                <option value="En reparto" {{ $compra->estado == "En reparto" ? "selected" : "" }}>@lang('messages.shopping_edit_info_5')</option>
                <option value="Ya lo tienes!" {{ $compra->estado == "Ya lo tienes!" ? "selected" : "" }}>@lang('messages.shopping_edit_info_6')</option>
            </select>
            <button class="btn btn-success" type="submit">@lang('messages.shopping_edit_info_7')</button>
        </form>
    </div>
</div>
@endsection