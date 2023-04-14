@extends('layout')
@section('content')
@if(isset(Auth::user()->id))
    <div class="d-flex justify-content-center mt-4 mb-4">

    <form action="{{ route('carritos.visualizar', Auth::user()->id) }}" method="get">
        @csrf
        <button class="btn btn-primary me-1" type="submit">Ver Carrito</button>
    </form>
    </div>
@endif
@if (isset($productos))
<h1 class="text-center">Productos</h1>
<table class="table text-black text-center w-75 mx-auto mt-5">
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    @if(isset(Auth::user()->id))
        <th>Añadir a Carrito</th>
    @endif
    @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->precio }}</td>
            <td>
            @if(isset(Auth::user()->id))
                <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}"
                    method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit">Añadir</button>
                </form>
            @endif
            </td>
        </tr>
    @endforeach
</table>
@endif
@endsection