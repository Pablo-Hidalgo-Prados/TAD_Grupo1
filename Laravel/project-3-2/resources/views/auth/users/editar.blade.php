@extends('layout')

@section('content')
@if(isset(Auth::user()->id))
@if(Auth::user()->id==$user->id || Auth::user()->rol==='admin')
<div class="w-50 border rounded p-3 mx-auto">
    <h3 class="text-center">Editar a {{ $user->name }}</h3>
    <form action="{{ route('usuarios.actualizar', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="user_id_2" value="{{ $user->id }}">
        <label>Nombre:</label>
        <input class="form-control mb-3 @error('name') is-invalid @enderror" type="text" value="{{ $user->name }}" name="name">
        <label>Apellidos:</label>
        <input class="form-control mb-3 @error('apellidos') is-invalid @enderror" type="text" value="{{ $user->apellidos }}" name="apellidos">
        <label>Teléfono:</label>
        <input class="form-control mb-3 @error('telefono') is-invalid @enderror" type="number" value="{{ $user->telefono }}" name="telefono">
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>

    <br>
    <br>

    <h3 class="text-center">Agregar dirección</h3>
    <form action="{{ route('usuarios.agregardireccion') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="agregar" value="profile">
        <label>Calle:</label>
        <input class="form-control mb-3 @error('calle') is-invalid @enderror" type="text" name="calle">
        <label>Ciudad:</label>
        <input class="form-control mb-3 @error('ciudad') is-invalid @enderror" type="text" name="ciudad">
        <label>Código Postal:</label>
        <input class="form-control mb-3 @error('codigo_postal') is-invalid @enderror" type="text" name="codigo_postal">
        <label>Numero:</label>
        <input class="form-control mb-3 @error('numero') is-invalid @enderror" type="number" name="numero">
        <label>Planta:</label>
        <input class="form-control mb-3" type="number" name="planta">
        <label>Puerta:</label>
        <input class="form-control mb-3" type="text" name="puerta">
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>
    <br>
    <h3 class="text-center">Borrar dirección</h3>
    <form action="{{ route('usuarios.borrardireccion') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <select class="form-select mb-3" id="direcciones_list" name="direcciones_list">
            @foreach ($user->direcciones as $direccion)
            <option value="{{ $direccion->id }}">{{ $direccion->calle.', '.$direccion->numero }}</option>
            @endforeach
        </select>
        <button class="btn btn-success" type="submit">Borrar</button>
    </form>

    


</div>
@endif
@endif
@endsection