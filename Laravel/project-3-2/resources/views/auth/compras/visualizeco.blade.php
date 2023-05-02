@extends('layout')

@section('content')
<div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center mb-4">Visualizando compra {{ $compra->subtotal }}€</h3>
        <p><strong>Fecha:</strong> {{ $compra->fecha }}</p>
        <p><strong>Subtotal:</strong> {{ $compra->subtotal }}</p>
        <p><strong>Dirección:</strong> {{ $compra->direccion }}</p>
        <p><strong>Estado:</strong> {{ $compra->estado }}</p>
        @foreach ($productos as $producto)
        <div class="col-md-6 col-lg-4">
                <div class="product-card border-success border-opacity-50">
                <p><strong>Productos:</strong></p>
                <img class="rounded-3" src="{{ '/images/'.$producto->imagen }}" alt="{{ $producto->nombre }}">
                    <p>Nombre: {{ $producto->nombre }}</p>
                    <p>Precio: {{ $producto->precio }}€</p>
                    <form action="{{ route('productos.visualizar',$producto->id) }}" method="get">
                        @csrf
                        <button class="btn btn-primary ml-1 mt-3" type="submit">Ver Producto</button>
                    </form>
                </div>
        </div>
        @endforeach
        <form action="{{ route('compras.editar', $compra->id) }}" method="get">
            @csrf
            <input type="hidden" name="compra_id" value="{{ $compra->id }}">
            @if(Auth::user()->rol=='admin')
            <button class="btn btn-primary ml-1 mt-3" type="submit">Editar compra</button>
            @endif
        </form>
        <form action="{{ route('compras.volver') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $compra->user_id }}" name="user_id">
            <button class="btn btn-success mt-3" type="submit">Volver</button>
        </form>
</div>
@endsection