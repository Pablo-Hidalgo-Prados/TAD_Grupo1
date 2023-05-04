@extends('layout')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="product-card border-success border-opacity-50 mt-3">
        <h2 class="text-center mb-4">@lang('messages.profile_info_1') {{ $user->name }}</h2>
        <div class="d-flex justify-content-center mt-4 mb-4">
            <img class="rounded-3 img-thumbnail" src="{{ '/images/'.$user->imagen }}" alt="{{ $user->nombre }}" width="288" height="288">
        </div>
        <p class="mb-4"><strong>@lang('messages.profile_info_2')</strong> {{ $user->name }}</p>
        <p class="mb-4"><strong>@lang('messages.profile_info_3')</strong> {{ $user->apellidos }}</p>
        @if(isset(Auth::user()->rol))
        @if(Auth::user()->rol=='admin' || Auth::user()->id==$user->id)
        <p class="mb-4"><strong>@lang('messages.profile_info_4')</strong> {{ $user->email }}</p>
        @if ($user->rol == 'admin')
        <p class="mb-4"><strong>@lang('messages.profile_info_5')</strong> {{ $user->rol }}</p>
        @endif
        <p class="mb-4"><strong>@lang('messages.profile_info_6')</strong> {{ $user->telefono }}</p>
        <p class="mb-4"><strong>@lang('messages.profile_info_7')</strong></p>
        @if(count($user->direcciones)<=0) @lang('messages.profile_info_8') @else @foreach ($user->direcciones as $direccion)
            <p>
                {{ '-'.$direccion->calle.', '.$direccion->numero }}
            </p>
            @endforeach
            @endif
            @endif
            @endif
    </div>

    <div class="d-flex justify-content-center mt-4 mb-4">

        @if(isset(Auth::user()->rol))
            @if(Auth::user()->rol=='admin' || Auth::user()->id==$user->id)
                @if(Auth::user()->rol!='admin')
                <form action="{{ route('usuarios.editar') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button class="btn btn-primary ml-1 me-1" type="submit">@lang('messages.profile_info_9')</button>
                </form>
                @else
                <form action="{{ route('usuarios.editarAdm') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button class="btn btn-primary ml-1 me-1" type="submit">@lang('messages.profile_info_9')</button>
                </form>
                @endif

                @if($user->rol!='admin')
                    <form action="{{ route('compras.listaruser') }}" method="post">
                        @csrf
                        <input type="hidden" name="modal" value="abrir">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button class="btn btn-primary ml-1 me-1" type="submit">@lang('messages.profile_info_10')</button>
                    </form>
                    <form action="{{ route('usuarios.favoritos') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button class="btn btn-primary" type="submit">@lang('messages.profile_info_18')</button>
                    </form>
                @endif
            @endif
        @endif
    </div>

    @if (isset($compras))

    @if(isset($mostrar))
        @if($mostrar=='si')
        <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
        </script>
        @else
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('hide');
            });
        </script>
        @endif
    @endif


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('messages.profile_info_10')</h5>
                    <form action="{{ route('compras.listaruser') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="modal" value="cerrar">
                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </form>
                </div>
                <div class="modal-body">
                @if(count($compras)>0)
                <table class="table border-success text-black text-center w-75 mx-auto mt-5">
                    <th>@lang('messages.profile_info_11')</th>
                    <th>@lang('messages.profile_info_12')</th>
                    <th>@lang('messages.profile_info_13')</th>
                    <th>@lang('messages.profile_info_14')</th>
                    <th>@lang('messages.profile_info_15')</th>
                    @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->fecha }}</td>
                        <td>{{ $compra->subtotal }}</td>
                        <td>{{ $compra->direccion }}</td>
                        <td>{{ $compra->estado }}</td>
                        @if(Auth::user()->rol=='admin')
                        <td class="">
                            <form action="{{ route('compras.eliminar', $compra->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar esta compra?')" class="btn btn-outline-danger me-0 me-sm-0 mb-1 mb-sm-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg></button>
                            </form>
                            <form action="{{ route('compras.editar', $compra->id) }}" method="get">
                                @csrf
                                <input type="hidden" name="compra_id" value="{{ $compra->id }}">
                                <button type="submit" class="btn btn-primary mx-2 mx-sm-2 my-1 my-sm-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></button>
                            </form>
                            <form action="{{ route('compras.visualizar', $compra->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-success ml-2 ml-sm-2 mt-1 mt-sm-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg></button>
                            </form>
                        </td>
                        @else
                            <td>
                                <form action="{{ route('compras.visualizar', $compra->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-success ml-2 ml-sm-2 mt-1 mt-sm-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg></button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
                @else
                    <p>@lang('messages.profile_info_16')</p>
                @endif
                    <form action="{{ route('compras.listaruser') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="modal" value="cerrar">
                        <button type="submit" class="btn btn-success cancel-btn" data-dismiss="modal" aria-label="Close">@lang('messages.profile_info_17')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>
</div>
@endsection