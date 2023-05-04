@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        @error('codigo')
        <div class="alert alert-danger"> @lang('messages.discount_edit_error_1') </div>
        @enderror
        @error('porcentaje')
        <div class="alert alert-danger"> @lang('messages.discount_edit_error_2') </div>
        @enderror
        <h3 class="text-center">@lang('messages.discount_edit_info_1') {{ $descuento->codigo }}</h3>
        <form action="{{ route('descuentos.actualizar',$descuento->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label>@lang('messages.discount_edit_info_2')</label>
            <input class="form-control mb-3" type="text" value="{{ $descuento->codigo }}" name="codigo">
            <label>@lang('messages.discount_edit_info_3')</label>
            <input class="form-control mb-3" type="number" value="{{ $descuento->porcentaje }}" name="porcentaje">
            <button class="btn btn-success" type="submit">@lang('messages.discount_edit_info_4')</button>
        </form>
    </div>
</div>
@endsection