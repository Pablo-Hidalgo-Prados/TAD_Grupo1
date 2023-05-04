@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        @error('nombre')
        <div class="alert alert-danger"> @lang('messages.category_edit_error_1') </div>
        @enderror
        @error('descripcion')
        <div class="alert alert-danger"> @lang('messages.category_edit_error_2') </div>
        @enderror
        <h3 class="text-center">@lang('messages.category_edit_info_1') {{ $categoria->nombre }}</h3>
        <form action="{{ route('categorias.actualizar',$categoria->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label>@lang('messages.category_edit_info_2')</label>
            <input class="form-control mb-3" type="text" value="{{ $categoria->nombre }}" name="nombre">
            <label>@lang('messages.category_edit_info_3')</label>
            <input class="form-control mb-3" type="text" value="{{ $categoria->descripcion }}" name="descripcion">
            <button class="btn btn-success" type="submit">@lang('messages.category_edit_info_4')</button>
        </form>
    </div>
</div>
@endsection