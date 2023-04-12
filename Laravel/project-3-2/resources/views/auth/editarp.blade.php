<html>
    <body>
        <div class="w-50 border rounded p-3 mx-auto">
            @error('nombre')
            <div class="alert alert-danger"> Debe rellenar el nombre </div>
            @enderror
            @error('descripcion')
            <div class="alert alert-danger"> Debe rellenar la descripcion </div>
            @enderror
            @error('precio')
            <div class="alert alert-danger"> Debe rellenar el precio </div>
            @enderror
            @error('stock')
            <div class="alert alert-danger"> Debe rellenar el stock </div>
            @enderror
            <h3 class="text-center">Editar a {{ $producto->name }}</h3>
            <form action="{{ route('productos.actualizar',$producto->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label>Nombre:</label>
                <input class="form-control mb-3" type="text" value="{{ $producto->nombre }}" name="nombre">
                <label>Descripción:</label>
                <input class="form-control mb-3" type="text" value="{{ $producto->descripcion }}" name="descripcion">
                <label>Precio:</label>
                <input class="form-control mb-3" type="number" value="{{ $producto->precio }}" name="precio">
                <label>Stock:</label>
                <input class="form-control mb-3" type="number" value="{{ $producto->stock }}" name="stock">
                <button class="btn btn-success" type="submit">Actualizar</button>
            </form>
        </div>
    </body>
</html>