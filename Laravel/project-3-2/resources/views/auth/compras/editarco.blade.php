@extends('layout')

@section('content')
        <div class="w-50 border rounded p-3 mx-auto">
            @error('fecha')
            <div class="alert alert-danger"> Debe rellenar la fecha </div>
            @enderror
            @error('subtotal')
            <div class="alert alert-danger"> Debe rellenar el subtotal </div>
            @enderror
            @error('direccion')
            <div class="alert alert-danger"> Debe rellenar la dirección </div>
            @enderror
            @error('estado')
            <div class="alert alert-danger"> Debe rellenar el estado </div>
            @enderror
            <h3 class="text-center">Editar compra {{ $compra->subtotal }}€</h3>
            <form action="{{ route('compras.actualizar',$compra->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label>Fecha:</label>
                <input class="form-control mb-3" type="text" value="{{ $compra->fecha }}" name="fecha">
                <label>Subtotal:</label>
                <input class="form-control mb-3" type="text" value="{{ $compra->subtotal }}" name="subtotal">
                <label>Dirección:</label>
                <input class="form-control mb-3" type="text" value="{{ $compra->direccion }}" name="direccion">
                <label>Estado:</label>
                <select class="form-select mb-3" name="estado">
                    <option value="En preparación" {{ $compra->estado == "En preparación" ? "selected" : "" }}>En preparación</option>
                    <option value="Preparado" {{ $compra->estado == "Preparado" ? "selected" : "" }}>Preparado</option>
                    <option value="En reparto" {{ $compra->estado == "En reparto" ? "selected" : "" }}>En reparto</option>
                    <option value="Ya lo tienes!" {{ $compra->estado == "Ya lo tienes!" ? "selected" : "" }}>Ya lo tienes!</option>
                </select>
                <button class="btn btn-success" type="submit">Actualizar</button>
            </form>
        </div>
@endsection