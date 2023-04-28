@extends('layout')

@section('content')
    <div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center">Perfil de {{ $user->name }}</h3>
        
        <div>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Apellidos:</strong> {{ $user->apellidos }}</p>
            @if(isset(Auth::user()->rol))
                @if(Auth::user()->rol=='admin' || Auth::user()->id==$user->id)
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    @if ($user->rol == 'admin')
                        <p><strong>Rol:</strong> {{ $user->rol }}</p>
                    @endif
                    <p><strong>Teléfono:</strong> {{ $user->telefono }}</p>
                    <p><strong>Direcciones:</strong></p>
                        @if(count($user->direcciones)<=0)
                            No se encontró ninguna dirección
                        @else
                            @foreach ($user->direcciones as $direccion)
                                <p>
                                {{ '-'.$direccion->calle.', '.$direccion->numero }}
                                </p>
                            @endforeach
                        @endif
                @endif
            @endif
            <form action="{{ route('usuarios.volver') }}" method="post">
                @csrf
                <button class="btn btn-success" type="submit">Volver</button>
            </form>
        </div>

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
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
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
