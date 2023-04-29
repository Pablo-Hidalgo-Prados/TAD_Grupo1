@extends('layout')

@section('content')
        <div class="w-50 border rounded p-3 mx-auto">
            @error('codigo')
            <div class="alert alert-danger"> Debe rellenar el código </div>
            @enderror
            @error('porcentaje')
            <div class="alert alert-danger"> Debe rellenar el porcentaje </div>
            @enderror
            <h3 class="text-center">Editar a {{ $descuento->codigo }}</h3>
            <form action="{{ route('descuentos.actualizar',$descuento->id) }}" method="POST">
                @method('PUT')
                @csrf
                <label>Código:</label>
                <input class="form-control mb-3" type="text" value="{{ $descuento->codigo }}" name="codigo">
                <label>Porcentaje:</label>
                <input class="form-control mb-3" type="number" value="{{ $descuento->porcentaje }}" name="porcentaje">
                <button class="btn btn-success" type="submit">Actualizar</button>
            </form>
        </div>
@endsection