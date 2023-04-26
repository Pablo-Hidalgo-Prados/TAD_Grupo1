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
            @if ($user->rol == 'admin')
                <label>Rol:</label>
                <input class="form-control mb-3" type="text" disabled value="{{ $user->rol }}" name="rol">
            @endif
            <label>Teléfono:</label>
            <input class="form-control mb-3" type="number" disabled value="{{ $user->telefono }}" name="telefono">
            <button class="btn btn-success" type="submit">Volver</button>
        </form>

        <div class="d-flex justify-content-center mt-4 mb-4">

            @if(isset(Auth::user()->rol))
                @if(Auth::user()->rol=='admin' || Auth::user()->id==$user->id)
                    @if(Auth::user()->rol!='admin')
                        <form action="{{ route('carritos.visualizar') }}" method="post">
                            @csrf
                            <button class="btn btn-primary me-1" type="submit">Ver Carrito</button>
                        </form>
                        <form action="{{ route('usuarios.editar') }}" method="post">
                            @csrf
                            <button class="btn btn-primary ml-1 me-1" type="submit">Editar Perfil</button>
                        </form>
                    @else
                        <form action="{{ route('usuarios.editarAdm') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button class="btn btn-primary ml-1 me-1" type="submit">Editar Perfil</button>
                        </form>
                    @endif
                    
                    <form action="{{ route('compras.listaruser') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button class="btn btn-primary ml-1" type="submit">Compras</button>
                    </form>
                @endif
            @endif
        </div>

        @if (isset($compras))
            <table class="table text-black text-center w-75 mx-auto mt-5">
                <th>Fecha</th>
                <th>Subtotal</th>
                <th>Dirección</th>
                <th>Estado</th>
                @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->fecha }}</td>
                        <td>{{ $compra->subtotal }}</td>
                        <td>{{ $compra->direccion }}</td>
                        <td>{{ $compra->estado }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
