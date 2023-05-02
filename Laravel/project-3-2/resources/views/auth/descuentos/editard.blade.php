@extends('layout')

@section('content')
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-5">
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
</div>
@endsection