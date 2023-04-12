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
                    <th>Quitar</th>
                    @foreach ($productos_carrito as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->pivot->cantidad }}</td>
                            <td>
                                <form action="{{ route('carritos.agregar', [$producto->id, Auth::user()->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Añadir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
    </body>
</html>