@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
@if(isset(Auth::user()->id))
@if(Auth::user()->id==$user->id || Auth::user()->rol==='admin')
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
        <h3 class="text-center">@lang('messages.edit_user_info_1') {{ $user->name }}</h3>
        <form action="{{ route('usuarios.actualizar', $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="user_id_2" value="{{ $user->id }}">
            <label>@lang('messages.profile_info_2')</label>
            <input class="form-control mb-3 @error('name') is-invalid @enderror" type="text" value="{{ $user->name }}" name="name">
            <label>@lang('messages.profile_info_3')</label>
            <input class="form-control mb-3 @error('apellidos') is-invalid @enderror" type="text" value="{{ $user->apellidos }}" name="apellidos">
            <label>@lang('messages.profile_info_6')</label>
            <input class="form-control mb-3 @error('telefono') is-invalid @enderror" type="number" value="{{ $user->telefono }}" name="telefono">
            <button class="btn btn-success" type="submit">@lang('messages.edit_user_info_2')</button>
        </form>

        <br>
        <br>

        <form action="{{ route('usuarios.imagen') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="nombre" value="{{ $user->nombre }}">
            <label>@lang('messages.edit_user_info_3')</label>
            <input class="form-control mb-3 @error('imagen_perfil') is-invalid @enderror" type="file" id="imagen_perfil" name="imagen_perfil">
            <button class="btn btn-success" type="submit">@lang('messages.edit_user_info_4')</button>
        </form>

        <br>
        <br>

        <h3 class="text-center">@lang('messages.edit_user_info_7')</h3>
        <form action="{{ route('usuarios.agregardireccion') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="agregar" value="profile">
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
        <br>
        <h3 class="text-center">@lang('messages.edit_user_info_5')</h3>
        <form action="{{ route('usuarios.borrardireccion') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <select class="form-select mb-3" id="direcciones_list" name="direcciones_list">
                @foreach ($user->direcciones as $direccion)
                <option value="{{ $direccion->id }}">{{ $direccion->calle.', '.$direccion->numero }}</option>
                @endforeach
            </select>
            <button class="btn btn-success" type="submit">@lang('messages.edit_user_info_6')</button>
        </form>

        <h3 class="text-center">@lang('messages.edit_user_info_8')</h3>
        <form action="{{ route('usuarios.cambiarpassword') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <label>@lang('messages.edit_user_info_9')</label>
            <input class="form-control mb-3 @error('psw_actual') is-invalid @enderror" type="password" name="psw_actual">
            <label>@lang('messages.edit_user_info_10')</label>
            <input class="form-control mb-3 @error('psw_nueva') is-invalid @enderror" type="password" name="psw_nueva">
            <label>@lang('messages.edit_user_info_11')</label>
            <input class="form-control mb-3 @error('psw_rep') is-invalid @enderror" type="password" name="psw_rep">
            <button class="btn btn-success" type="submit">@lang('messages.edit_user_info_12')</button>
        </form>

    </div>
</div>
@endif
@endif
@endsection