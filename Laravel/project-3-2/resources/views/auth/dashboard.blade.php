@extends('layout')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@error('nombre')
<p>@lang('messages.dashboard_error_1')</p>
@enderror
@error('descripcion')
<p>@lang('messages.dashboard_error_2')</p>
@enderror
@error('precio')
<p>@lang('messages.dashboard_error_3')</p>
@enderror
@error('stock')
<p>@lang('messages.dashboard_error_4')</p>
@enderror
@error('imagen')
<p>@lang('messages.dashboard_error_5')</p>
@enderror

@error('nombrec')
<p>@lang('messages.dashboard_error_6')</p>
@enderror
@error('descripcionc')
<p>@lang('messages.dashboard_error_7')</p>
@enderror

@if (Auth::user()->rol == 'admin')
<!--ROL ADMIN-->

<div class="row m-0">

    <div class="col-lg-2 col-md-4 col-sm-12 bg-dark">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white">
            <span class="fs-4">@lang('messages.dashboard_info_28')</span>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item list_element rounded">
                    <a class="nav-link text-light" href="{{ route('usuarios.listar') }}">@lang('messages.dashboard_btn_4')</a>
                </li>
                <li class="nav-item list_element rounded">
                    <a class="nav-link text-light" href="{{ route('productos.listar') }}">@lang('messages.dashboard_btn_5')</a>
                </li>
                <li class="nav-item list_element rounded">
                    <a class="nav-link text-light" href="{{ route('categorias.listar') }}">@lang('messages.dashboard_btn_6')</a>
                </li>
                <li class="nav-item list_element rounded">
                    <a class="nav-link text-light" href="{{ route('descuentos.listar') }}">@lang('messages.dashboard_btn_7')</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-10 col-md-8 col-sm-12 justify-content-center">
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-center mt-5 mb-4">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                @lang('messages.dashboard_btn_info_1')
            </button>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('messages.dashboard_btn_info_1')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('productos.crear') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror mt-1" name="nombre" value="" placeholder="@lang('messages.dashboard_info_12')" required autofocus>
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror mt-1" name="descripcion" placeholder="@lang('messages.dashboard_info_13')" required autofocus></textarea>
                                <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror mt-1" name="precio" value="" placeholder="@lang('messages.dashboard_info_14')" required autofocus>
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror mt-1" name="stock" value="" placeholder="@lang('messages.dashboard_info_15')" required autofocus>
                                <input class="form-control @error('imagen') is-invalid @enderror mt-1" type="file" id="imagen" name="imagen"><br>
                                <button class="btn btn-success mt-1" type="submit">@lang('messages.dashboard_btn_info_1')</button>
                                <button type="button" class="btn btn-secondary cancel-btn mt-1" data-dismiss="modal" aria-label="Close">@lang('messages.dashboard_btn_8')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->

            <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#exampleModal2">
                @lang('messages.dashboard_btn_info_2')
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('messages.dashboard_btn_info_2')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('categorias.crear') }}" method="post">
                                @csrf
                                <input id="nombrec" type="text" class="form-control @error('nombrec') is-invalid @enderror mt-1" name="nombrec" value="" placeholder="@lang('messages.dashboard_info_12')" required autofocus>
                                <input id="descripcionc" type="text" class="form-control @error('descripcionc') is-invalid @enderror mt-1" name="descripcionc" value="" placeholder="@lang('messages.dashboard_info_13')" required autofocus>
                                <button class="btn btn-success mt-1" type="submit">@lang('messages.dashboard_btn_info_2')</button>
                                <button type="button" class="btn btn-secondary cancel-btn mt-1" data-dismiss="modal" aria-label="Close">@lang('messages.dashboard_btn_8')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                @lang('messages.dashboard_btn_info_3')
            </button>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('messages.dashboard_btn_info_3')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('descuentos.crear') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror mt-1" name="codigo" value="" placeholder="@lang('messages.dashboard_info_24')" required autofocus>
                                <input id="porcentaje" type="number" class="form-control @error('porcentaje') is-invalid @enderror mt-1" name="porcentaje" placeholder="@lang('messages.dashboard_info_25')" required autofocus></textarea>
                                <button class="btn btn-success mt-1" type="submit">@lang('messages.dashboard_btn_info_3')</button>
                                <button type="button" class="btn btn-secondary cancel-btn mt-1" data-dismiss="modal" aria-label="Close">@lang('messages.dashboard_btn_8')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--USUARIOS LISTA-->
        @if (isset($usuarios))
        <h1 class="text-center">@lang('messages.dashboard_info_4')</h1>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $usuarios->links() }}
        </div>

        <div class="m-2">
            <table class="table border-success text-black text-center w-75 mx-auto mt-5">
                <th class="d-none d-lg-table-cell">@lang('messages.dashboard_info_5')</th>
                <th>@lang('messages.dashboard_info_6')</th>
                <th>@lang('messages.dashboard_info_7')</th>
                <th class="d-none d-lg-table-cell">@lang('messages.dashboard_info_8')</th>
                <th>@lang('messages.dashboard_info_9')</th>
                @foreach ($usuarios as $user)
                <tr>
                    <td class="d-none d-lg-table-cell align-middle">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->name }} {{ $user->apellidos }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="d-none d-lg-table-cell align-middle">{{ $user->telefono }}</td>
                    <td class="">

                        <form action="{{ route('usuarios.eliminar', $user->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')" class="btn btn-danger mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg></button>
                        </form>
                        <form action="{{ route('usuarios.editarAdm') }}" class="d-inline" method="get">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></button>
                        </form>
                        <form action="{{ route('usuarios.visualizar', $user->id) }}" class="d-inline" method="get">
                            @csrf
                            <button type="submit" class="btn btn-success mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $usuarios->links() }}
        </div>
        @endif
        <!--PRODUCTOS LISTA-->
        @if (isset($productos))
        <h1 class="text-center">@lang('messages.dashboard_info_10')</h1>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $productos->links() }}
        </div>

        <div class="m-2">
            <table class="table border-success text-black text-center w-75 mx-auto mt-5">
                <th>@lang('messages.dashboard_info_11')</th>
                <th>@lang('messages.dashboard_info_12')</th>
                <th class="d-none d-lg-table-cell">@lang('messages.dashboard_info_13')</th>
                <th>@lang('messages.dashboard_info_14')</th>
                <th>@lang('messages.dashboard_info_15')</th>
                <th>@lang('messages.dashboard_info_16')</th>
                @foreach ($productos as $producto)
                <tr>
                    <td class="align-middle">{{ $producto->id }}</td>
                    <td class="align-middle">{{ $producto->nombre }}</td>
                    <td class="d-none d-lg-table-cell align-middle">{{ $producto->descripcion }}</td>
                    <td class="align-middle">{{ $producto->precio }}</td>
                    <td class="align-middle">{{ $producto->stock }}</td>
                    <td class="">

                        <form action="{{ route('productos.eliminar', $producto->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')" class="btn btn-danger mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg></button>
                        </form>
                        <form action="{{ route('productos.editar', $producto->id) }}" class="d-inline" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></button>
                        </form>
                        <form action="{{ route('productos.visualizar', $producto->id) }}" class="d-inline" method="get">
                            @csrf
                            <button type="submit" class="btn btn-success mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $productos->links() }}
        </div>

        @endif

        <!--CATEGORÍAS LISTA-->
        @if (isset($categorias))
        <h1 class="text-center">@lang('messages.dashboard_info_17')</h1>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $categorias->links() }}
        </div>

        <table class="table border-success text-black text-center w-75 mx-auto mt-5">
            <th>@lang('messages.dashboard_info_18')</th>
            <th>@lang('messages.dashboard_info_19')</th>
            <th>@lang('messages.dashboard_info_20')</th>
            <th>@lang('messages.dashboard_info_21')</th>
            @foreach ($categorias as $categoria)
            <tr>
                <td class="align-middle">{{ $categoria->id }}</td>
                <td class="align-middle">{{ $categoria->nombre }}</td>
                <td class="align-middle">{{ $categoria->descripcion }}</td>
                <td class="">

                    <form action="{{ route('categorias.eliminar', $categoria->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este descuento?')" class="btn btn-danger mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg></button>
                    </form>
                    <form action="{{ route('categorias.editar', $categoria->id) }}" class="d-inline" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></button>
                    </form>
                    <form action="{{ route('categorias.visualizar', $categoria->id) }}" class="d-inline" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $categorias->links() }}
        </div>

        @endif

        <!--Descuentos LISTA-->
        @if (isset($descuentos))
        <h1 class="text-center">@lang('messages.dashboard_info_22')</h1>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $descuentos->links() }}
        </div>

        @if(count($descuentos)>0)
        <table class="table border-success text-black text-center w-75 mx-auto mt-5">
            <th class="d-none d-lg-table-cell">@lang('messages.dashboard_info_23')</th>
            <th>@lang('messages.dashboard_info_24')</th>
            <th>@lang('messages.dashboard_info_25')</th>
            <th>@lang('messages.dashboard_info_26')</th>
            @foreach ($descuentos as $descuento)
            <tr>
                <td class="d-none d-lg-table-cell align-middle">{{ $descuento->id }}</td>
                <td class="align-middle">{{ $descuento->codigo }}</td>
                <td class="align-middle">{{ $descuento->porcentaje }}</td>
                <td class="">

                    <form action="{{ route('descuentos.eliminar', $descuento->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este descuento?')" class="btn btn-danger mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg></button>
                    </form>
                    <form action="{{ route('descuentos.editar', $descuento->id) }}" class="d-inline" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></button>
                    </form>
                    <form action="{{ route('descuentos.visualizar', $descuento->id) }}" class="d-inline" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex justify-content-center mt-4 mb-4">
            {{ $descuentos->links() }}
        </div>

        @else
        <div class="d-flex justify-content-center mt-5 mb-5">
            <p class="text-center h5">@lang('messages.dashboard_info_27')</p>
        </div>
        <div class="d-flex justify-content-center mt-5 mb-5">
        </div>
        <div class="d-flex justify-content-center mt-5 mb-5">
        </div>
        <div class="d-flex justify-content-center mt-5 mb-5">
        </div>
        @endif
        @endif

        @else
        <!--ROL CLIENTE-->
        <div class="d-flex justify-content-center mt-4 mb-4">

            <form action="{{ route('carritos.visualizar') }}" method="post">
                @csrf
                <button class="btn btn-primary me-1" type="submit">Ver Carrito</button>
            </form>
            <form action="{{ route('usuarios.editar') }}" method="post">
                @csrf
                <button class="btn btn-primary ml-1" type="submit">Editar Perfil</button>
            </form>
        </div>
        @endif

    </div>

</div>

</div>

</div>





@endsection