@extends('layout')

@section('content')
<div class="w-50 border rounded p-3 mx-auto">
    @error('nombre')
    <div class="alert alert-danger"> Debe rellenar el nombre </div>
    @enderror
    @error('apellidos')
    <div class="alert alert-danger"> Debe rellenar los apellidos </div>
    @enderror
    @error('telefono')
    <div class="alert alert-danger"> Debe rellenar el teléfono </div>
    @enderror
    <h3 class="text-center">Editar a {{ $user->name }}</h3>
    <form action="{{ route('usuarios.actualizar', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <label>Nombre:</label>
        <input class="form-control mb-3" type="text" value="{{ $user->name }}" name="name">
        <label>Apellidos:</label>
        <input class="form-control mb-3" type="text" value="{{ $user->apellidos }}" name="apellidos">
        <label>Teléfono:</label>
        <input class="form-control mb-3" type="number" value="{{ $user->telefono }}" name="telefono">
        <button class="btn btn-success" type="submit">Actualizar</button>
    </form>

    <br>
    <br>

    <h3 class="text-center">Agregar dirección</h3>
    <form action="{{ route('usuarios.agregardireccion') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <label>Calle:</label>
        <input class="form-control mb-3" type="text" name="calle">
        <label>Ciudad:</label>
        <input class="form-control mb-3" type="text" name="ciudad">
        <label>Código Postal:</label>
        <input class="form-control mb-3" type="text" name="codigo_postal">
        <label>Numero:</label>
        <input class="form-control mb-3" type="number" name="numero">
        <label>Planta:</label>
        <input class="form-control mb-3" type="number" name="planta">
        <label>Puerta:</label>
        <input class="form-control mb-3" type="text" name="puerta">
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>


</div>
@endsection