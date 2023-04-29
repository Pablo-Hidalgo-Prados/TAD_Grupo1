@extends('layout')

@section('content')
<div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center mb-4">Visualizando a {{ $descuento->codigo }}</h3>
        <p><strong>Código:</strong> {{ $descuento->codigo }}</p>
        <p><strong>Descripción:</strong> {{ $descuento->porcentaje }}</p>
            <form action="{{ route('descuentos.listar') }}" method="POST">
                @csrf
                <button class="btn btn-success" type="submit">Volver</button>
            </form>
        </div>
</div>
@endsection