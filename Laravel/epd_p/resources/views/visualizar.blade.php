@extends('layouts.estructura')
@section('contenidoPrincipal')
            <div class="w-50 border rounded p-3 mx-auto">
                <h3 class="text-center">Editar a {{ $persona->nombre }}</h3>
                <form action="{{ route('personas.volver') }}" method="get">
                    <label>Nombre:</label>
                    <input type="hidden" disabled value="{{ $rango }}" name="rango">
                    <input class="form-control mb-3" type="text" disabled value="{{ $persona->nombre }}" name="nombre">
                    <label>Apellidos:</label>
                    <input class="form-control mb-3" type="text" disabled value="{{ $persona->apellidos }}" name="apellidos">
                    <label>Edad:</label>
                    <input class="form-control mb-3" type="integer" disabled value="{{ $persona->edad }}" name="edad">
                    @if ($rango==='trabajador' || $rango==='empleado' || $rango==='gerente')
                    <label>Teléfono:</label>
                    <input class="form-control mb-3" type="integer" disabled value="{{ $persona->telefonos }}" name="telefonos">
                    @endif
                    @if ($rango==='empleado')
                    <label>Precio por hora:</label>
                    <input class="form-control mb-3" type="float" disabled value="{{ $persona->precioPorHora }}" name="precioPorHora">
                    <label>Horas trabajadas:</label>
                    <input class="form-control mb-3" type="float" disabled value="{{ $persona->horasTrabajadas }}" name="horasTrabajadas">
                    <label>Debe pagar impuestos:</label>
                    <input class="form-control mb-3" type="float" disabled value="{{ $persona->debePagarImpuestos }}" name="debePagarImpuestos">
                    <label>Calcular sueldo:</label>
                    <input class="form-control mb-3" type="float" disabled value="{{ $persona->calcularSueldo }}" name="calcularSueldo">
                    @elseif ($rango==='gerente')
                    <label>Salario:</label>
                    <input class="form-control mb-3" type="text" disabled value="{{ $persona->salario }}" name="salario">
                    <label>Debe pagar impuestos:</label>
                    <input class="form-control mb-3" type="float" disabled value="{{ $persona->debePagarImpuestos }}" name="debePagarImpuestos">
                    <label>Calcular sueldo:</label>
                    <input class="form-control mb-3" type="float" disabled value="{{ $persona->calcularSueldo }}" name="calcularSueldo">
                    @endif
                    <button class="btn btn-success" type="submit">Volver</button>
                </form>
            </div>
@endsection