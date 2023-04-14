@extends('layout')

@section('content')
<div class="m-4">
    <h3 class="text-center">Carrito de {{ $user->name }}</h3>
    <table class="table text-black text-center w-75 mx-auto mt-5">
        <th>ID</th>
        <th>Nombre</th>
        <th class="d-none d-lg-block">Descripción</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Acciones</th>
        @foreach ($productos_carrito as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td class="d-none d-lg-block">{{ $producto->descripcion }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->pivot->cantidad }}</td>
            <td class="d-flex xs:block justify-content-center">
                <form action="{{ route('carritos.reducir', [$producto->id, Auth::user()->id]) }}" method="get">
                    @csrf
                    <button class="btn btn-danger me-2 rounded-3" type="submit">-</button>
                </form>
                <form action="{{ route('carritos.incrementar', [$producto->id, Auth::user()->id]) }}" method="get">
                    @csrf
                    <button class="btn btn-success ml-2 rounded-3" type="submit">+</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <h3 class="text-center">Precio total {{ $precio_total }}</h3>
    <div class="d-flex flex-grow-1 mx-4">
        <div class="d-flex justify-content-left mt-4 mb-4 me-4">
            <form action="{{ route('usuarios.volver') }}" method="POST">
                @csrf
                <button class="btn btn-success me-2" type="submit">Volver</button>
            </form>
            <form action="{{ route('carritos.vaciar', [$user->id]) }}" method="POST">
                @csrf
                <button class="btn btn-success ml-2" type="submit">Vaciar carrito</button>
            </form>
        </div>
        <div class="d-flex justify-content-end mt-4 mb-4 ml-4 flex-grow-1">
            <form action="{{ route('compras.crear') }}" method="POST">
                @csrf
                <!-- Agrega los campos del formulario que contienen los datos necesarios -->
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="productos_carrito" value="{{ json_encode($productos_carrito) }}">
                <input type="hidden" name="precio_total" value="{{ $precio_total }}">
                <label for="direcciones_list">Escoge una dirección</label>
                <select class="form-select" id="direcciones_list" name="direcciones_list">
                    @foreach ($direcciones as $direccion)
                    <option value="{{ $direccion->id }}">{{ $direccion->calle.', '.$direccion->numero }}</option>
                    @endforeach
                </select>
                @if($direcciones->count()==0)
                <button class="btn btn-success mt-2" disabled type="submit">Comprar</button>
                @else
                <button class="btn btn-success" type="submit">Comprar</button>
                @endif
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    @if($direcciones->count()==0)
    <p class="d-flex justify-content-center h4">Buenas Rutero/a recuerda que para finalizar la compra necesitamos que nos proporciones una dirección</p>
    <div class="d-flex justify-content-center mt-4 mb-4 ml-4 flex-grow-1">

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
    @endif

</div>
@endsection