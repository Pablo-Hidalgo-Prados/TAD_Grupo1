@extends('layout')

@section('content')
<div class="w-50 border rounded p-3 mx-auto">
    <h3 class="text-center">Perfil de {{ $user->name }}</h3>
    <form action="{{ route('usuarios.volver') }}" method="post">
        @csrf
        <label>Nombre:</label>
        <input class="form-control mb-3" type="text" disabled value="{{ $user->name }}" name="name">
        <label>Apellidos:</label>
        <input class="form-control mb-3" type="text" disabled value="{{ $user->apellidos }}" name="apellidos">
        <label>Email:</label>
        <input class="form-control mb-3" type="email" disabled value="{{ $user->email }}" name="email">
        @if($user->rol=='admin')
        <label>Rol:</label>
        <input class="form-control mb-3" type="text" disabled value="{{ $user->rol }}" name="rol">
        @endif
        <label>Teléfono:</label>
        <input class="form-control mb-3" type="number" disabled value="{{ $user->telefono }}" name="telefono">
        <button class="btn btn-success" type="submit">Volver</button>
    </form>

    <div class="d-flex justify-content-center mt-4 mb-4">

        <form action="{{ route('carritos.visualizar', Auth::user()->id) }}" method="get">
            @csrf
            <button class="btn btn-primary me-1" type="submit">Ver Carrito</button>
        </form>
        <form action="{{ route('usuarios.editar', Auth::user()->id) }}" method="get">
            @csrf
            <button class="btn btn-primary ml-1" type="submit">Editar Perfil</button>
        </form>
    </div>
</div>
@endsection