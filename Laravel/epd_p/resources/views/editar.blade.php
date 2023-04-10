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
        @error('telefonos')
            <div class="alert alert-danger"> Debe rellenar el teléfono </div>
        @enderror
        @error('salario')
            <div class="alert alert-danger"> Debe rellenar el salario </div>
        @enderror
        @error('precioPorHora')
            <div class="alert alert-danger"> Debe rellenar el precio por hora </div>
        @enderror
        @error('horasTrabajadas')
            <div class="alert alert-danger"> Debe rellenar el horas trabajadas </div>
        @enderror
        <div class="w-50 border rounded p-3 mx-auto">
            <h1>Editar {{ $rango }}</h1>
            <form action="{{ route('personas.actualizar',$persona->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label>Nombre:</label>
                <input type="hidden" value="{{ $rango }}" name="rango">
                <input class="form-control mb-3" type="text" value="{{ $persona->nombre }}" name="nombre">
                <label>Apellidos:</label>
                <input class="form-control mb-3" type="text" value="{{ $persona->apellidos }}" name="apellidos">
                <label>Edad:</label>
                <input class="form-control mb-3" type="number" value="{{ $persona->edad }}" name="edad">
                @if ($rango==='trabajador' || $rango==='empleado' || $rango==='gerente')
                <div id="div_trabajador">
                    <label id="l_telefono">Teléfono:</label>
                    <input id="telefono" class="form-control mb-3" type="number" value="{{ $persona->telefonos }}" name="telefonos">
                        @if ($rango==='trabajador')
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" onclick="camposGerente('{{ $rango }}')">Gerente</input><br>
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" onclick="camposEmpleado('{{ $rango }}')">Empleado</input><br>
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" checked onclick="camposTrabajador('{{ $rango }}')">Trabajador</input><br>
                        <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" onclick="ocultaInputs()">Persona</input><br>
                        @endif
                </div>
                @else
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" onclick="camposGerente('{{ $rango }}')">Gerente</input><br>
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" onclick="camposEmpleado('{{ $rango }}')">Empleado</input><br>
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" onclick="camposTrabajador('{{ $rango }}')">Trabajador</input><br>
                <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" checked onclick="ocultaInputs()">Persona</input><br>
                @endif
                @if ($rango==='empleado')
                <div id="div_empleado">
                    <label id="l_precioPorHora">Precio por hora:</label>
                    <input id="precioPorHora" class="form-control mb-3" type="number" value="{{ $persona->precioPorHora }}" name="precioPorHora">
                    <label id="l_horasTrabajadas">Horas trabajadas:</label>
                    <input if="horasTrabajadas" class="form-control mb-3" type="number" value="{{ $persona->horasTrabajadas }}" name="horasTrabajadas">
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" onclick="camposGerente('{{ $rango }}')">Gerente</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" checked onclick="camposEmpleado('{{ $rango }}')">Empleado</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" onclick="camposTrabajador('{{ $rango }}')">Trabajador</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" onclick="ocultaInputs()">Persona</input><br>
                </div>
                @elseif ($rango==='gerente')
                <div id="div_gerente">
                    <label id="l_salario">Salario:</label>
                    <input id="salario" class="form-control mb-3" type="number" value="{{ $persona->salario }}" name="salario">
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Gerente" checked onclick="camposGerente('{{ $rango }}')">Gerente</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Empleado" onclick="camposEmpleado('{{ $rango }}')">Empleado</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Trabajador" onclick="camposTrabajador('{{ $rango }}')">Trabajador</input><br>
                    <input class="form-check-input me-2" type="radio" name="rango_cambio" value="Persona" onclick="ocultaInputs()">Persona</input><br>
                </div>
                @endif
                <div id="campos_nuevos"></div>
                <button class="btn btn-success mt-3" type="submit">Editar</button>
            </form>
        </div>
@endsection