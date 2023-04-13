<html>
    <body>
        <div class="w-50 border rounded p-3 mx-auto">
                <h3 class="text-center">Carrito de {{ $user->name }}</h3>
                <table class="table text-black text-center w-75 mx-auto mt-5">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Reducir/Incrementar</th>
                    @foreach ($productos_carrito as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->pivot->cantidad }}</td>
                            <td>
                                <form action="{{ route('carritos.reducir', [$producto->id, Auth::user()->id]) }}" method="get">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">-</button>
                                </form>
                                <form action="{{ route('carritos.incrementar', [$producto->id, Auth::user()->id]) }}" method="get">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">+</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <h3 class="text-center">Precio total {{ $precio_total }}</h3>
                <form action="{{ route('productos.listar') }}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit">Volver</button>
                </form>
                <form action="{{ route('compras.crear') }}" method="POST">
                    @csrf
                    <!-- Agrega los campos del formulario que contienen los datos necesarios -->
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="productos_carrito" value="{{ json_encode($productos_carrito) }}">
                    <input type="hidden" name="precio_total" value="{{ $precio_total }}">
                    <button class="btn btn-success" type="submit">Comprar</button>
                </form>
            </div>
    </body>
</html>