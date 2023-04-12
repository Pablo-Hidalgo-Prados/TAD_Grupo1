@extends('auth.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>

        @if(Auth::user()->rol=='admin')
        <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Crear Producto
                </div>

                <div class="card-body">
                    <form action="{{ route('productos.crear') }}" method="post">
                        @csrf
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror mt-1" name="nombre" value="" placeholder="Nombre" required autofocus>
                        <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror mt-1" name="descripcion" value="" placeholder="Descripcion" required autofocus>
                        <input id="precio" type="number" class="form-control @error('precio') is-invalid @enderror mt-1" name="precio" value="" placeholder="Precio" required autofocus>
                        <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror mt-1" name="stock" value="" placeholder="Stock" required autofocus>
                        <button class="btn btn-success mt-1" type="submit">Crear Producto</button>
                    </form>
                </div>
            </div>
        </div>
        <form action="{{ route('usuarios.listar') }}" method="post">
            @csrf
            <button class="btn btn-success m-1" type="submit">Listar Usuarios</button>
        </form>
        <form action="{{ route('productos.listar') }}" method="post">
            @csrf
            <button class="btn btn-success m-1" type="submit">Listar Productos</button>
        </form>
        @else
            <p>CLIENTE</p>
        @endif
        @if(isset($usuarios))
        <h1 class="text-center">Usuarios</h1>
            <table class="table text-black text-center w-75 mx-auto mt-5">
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Teléfono</th>
                <th>Borrar</th>
                <th>Editar</th>
                <th>Visualizar</th>
                @foreach ($usuarios as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->apellidos }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rol }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>
                            <form action="{{ route('usuarios.eliminar', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('usuarios.editar', $user->id) }}" method="get">
                                @csrf
                                <button class="btn btn-primary" type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('usuarios.visualizar', $user->id) }}" method="get">
                                @csrf
                                <button class="btn btn-success" type="submit">Visualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
        @if(isset($productos))
        <h1 class="text-center">Productos</h1>
            <table class="table text-black text-center w-75 mx-auto mt-5">
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Borrar</th>
                <th>Editar</th>
                <th>Visualizar</th>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <form action="{{ route('productos.eliminar', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('productos.editar', $producto->id) }}" method="get">
                                @csrf
                                <button class="btn btn-primary" type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('productos.visualizar', $producto->id) }}" method="get">
                                @csrf
                                <button class="btn btn-success" type="submit">Visualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>

</div>
@endsection