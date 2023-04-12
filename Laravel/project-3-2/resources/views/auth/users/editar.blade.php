<html>
    <body>
        <div class="w-50 border rounded p-3 mx-auto">
            @error('nombre')
            <div class="alert alert-danger"> Debe rellenar el nombre </div>
            @enderror
            @error('apellidos')
            <div class="alert alert-danger"> Debe rellenar los apellidos </div>
            @enderror
            @error('telefono')
            <div class="alert alert-danger"> Debe rellenar el teléfono </div>
            @enderror
            <h3 class="text-center">Editar a {{ $user->name }}</h3>
            <form action="{{ route('usuarios.actualizar',$user->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label>Nombre:</label>
                <input class="form-control mb-3" type="text" value="{{ $user->name }}" name="name">
                <label>Apellidos:</label>
                <input class="form-control mb-3" type="text" value="{{ $user->apellidos }}" name="apellidos">
                <label>Teléfono:</label>
                <input class="form-control mb-3" type="number" value="{{ $user->telefono }}" name="telefono">
                <button class="btn btn-success" type="submit">Actualizar</button>
            </form>
        </div>
    </body>
</html>