@extends('layout')

@section('content')
<div class="w-50 border rounded p-3 mx-auto">
        <h3 class="text-center mb-4">Visualizando a {{ $categoria->nombre }}</h3>
        <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
            <form action="{{ route('categorias.listar') }}" method="POST">
                @csrf
                <button class="btn btn-success" type="submit">Volver</button>
            </form>
        </div>
</div>
@endsection