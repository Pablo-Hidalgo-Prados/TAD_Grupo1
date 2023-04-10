@extends('layouts.estructura')
@section('contenidoPrincipal')
        @error('nombre')
            <div class="alert alert-danger"> Debe rellenar el nombre </div>
        @enderror
        @error('apellidos')
            <div class="alert alert-danger"> Debe rellenar los apellidos </div>
        @enderror
        @error('edad')
            <div class="alert alert-danger"> Debe rellenar la edad </div>
        @enderror
        @error('telefono')
            <div class="alert alert-danger"> Debe rellenar el teléfono </div>
        @enderror
        @error('salario')
            <div class="alert alert-danger"> Debe rellenar el salario </div>
        @enderror
        @error('precioPorHora')
            <div class="alert alert-danger"> Debe rellenar el precio por hora </div>
        @enderror
        @error('horasTrabajadas')
            <div class="alert alert-danger"> Debe rellenar el teléfono </div>
        @enderror
        @error('esTrabajador')
            <div class="alert alert-danger"> Debe rellenar si es trabajador </div>
        @enderror
        @error('rango')
            <div class="alert alert-danger"> Debe rellenar el rango </div>
        @enderror
        <h1 class="text-center">Personas</h1>
        <table class="table text-white text-center w-75 mx-auto mt-5">
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Trabajador</th>
            <th>Gerente</th>
            <th>Borrar</th>
            <th>Editar</th>
            <th>Visualizar</th>
            @foreach ($personas as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->apellidos }}</td>
                    <td>{{ $persona->edad }}</td>
                    <td>{{ $persona->esTrabajador }}</td>
                    <td>{{ $persona->esGerente }}</td>
                    <td>
                        <form action="{{ route('personas.eliminar', $persona) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('personas.editar', $persona) }}" method="get">
                            @csrf
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('personas.visualizar', $persona) }}" method="get">
                            @csrf
                            <button class="btn btn-success" type="submit">Visualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <form class="w-50 mx-auto border rounded p-3" action="{{ route('personas.crear') }}" method="post">
            @csrf
            <label class="h5">Persona:</label>
            <input class="form-control mt-3 mb-3" type="text" name="nombre" placeholder="Nombre">
            <input class="form-control mb-3" type="text" name="apellidos" placeholder="Apellidos">
            <input class="form-control mb-3" type="number" name="edad" placeholder="Edad">
            <br>
            <label class="h5">Trabajador:</label><br>
            <input class="form-check-input me-2" type="radio" name="esTrabajador" value="Trabajador" onclick="addTrabajador()">Sí</input><br>
            <input class="form-check-input me-2" type="radio" name="esTrabajador" value="No Trabajador" onclick="removeTrabajador()">No</input>
            <div id="div_trabajador" class="d-none">
                <input class="form-control mt-2" id="telefono" type="number" name="telefono" placeholder="Teléfono">
                <label class="h5 mt-2">Rango:</label><br>
                <input class="form-check-input me-2" type="radio" name="rango" value="Gerente" onclick="addGerente()">Gerente</input><br>
                <input class="form-check-input me-2" type="radio" name="rango" value="Empleado" onclick="addEmpleado()">Empleado</input><br>
                <input class="form-check-input me-2" type="radio" name="rango" value="Trabajador" onclick="removeDivs()">Ninguno</input>
            </div>
            <br>
            <div id="div_gerente"></div>
            <div id="div_empleado"></div>
            <br>
            <button class="btn btn-success" type="submit">Crear Nueva</button>
        </form>
@endsection