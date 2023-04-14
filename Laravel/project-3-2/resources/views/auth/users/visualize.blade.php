@extends('layout')

@section('content')
    <div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center">Visualizando a {{ $user->name }}</h3>
        <form action="{{ route('usuarios.listar') }}" method="post">
            @csrf
            <label>Nombre:</label>
            <input class="form-control mb-3" type="text" disabled value="{{ $user->name }}" name="name">
            <label>Apellidos:</label>
            <input class="form-control mb-3" type="text" disabled value="{{ $user->apellidos }}" name="apellidos">
            <label>Email:</label>
            <input class="form-control mb-3" type="email" disabled value="{{ $user->email }}" name="email">
            <label>Rol:</label>
            <input class="form-control mb-3" type="text" disabled value="{{ $user->rol }}" name="rol">
            <label>Teléfono:</label>
            <input class="form-control mb-3" type="number" disabled value="{{ $user->telefono }}" name="telefono">
            <button class="btn btn-success" type="submit">Volver</button>
        </form>
    </div>
@endsection
