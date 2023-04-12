<html>
    <body>
        <div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center">Visualizando a {{ $categoria->nombre }}</h3>
            <form action="{{ route('categorias.listar') }}" method="POST">
                @csrf
                <label>Nombre:</label>
                <input class="form-control mb-3" type="text" disabled value="{{ $categoria->nombre }}" name="nombre">
                <label>Apellidos:</label>
                <input class="form-control mb-3" type="text" disabled value="{{ $categoria->descripcion }}" name="descripcion">
                <button class="btn btn-success" type="submit">Volver</button>
            </form>
        </div>
    </body>
</html>