<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature Hub</title>
    <link rel="icon" type="image/x-icon" href="/images/webicon_old_big.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#alerta").delay(2000).fadeOut();
        });
    </script>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body class="bggeneral">
    <nav class="navbar navbar-expand-md bgnavbar sticky-top rounded-5 mt-3 mx-3 opacity" id="navbar">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand text-light" href="/">
                    <img src="/images/webicon.png" alt="Icono de -nombre de web-" width="90" height="90" class="align-text-center">Nature Hub
                </a>
            </div>
            <button class="navbar-toggler navbutton" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-dark"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex flex-grow-1">
                    <ul class="nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('rutas') }}">Rutas</a>
                        </li>

                        @if(isset(Auth::user()->id))
                        @if(Auth::user()->rol=='admin')
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="/panel">Panel Admin</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('productos.vista') }}">Productos</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('productos.vista') }}">Productos</a>
                        </li>
                        @endif
                    </ul>
                    @if (Route::has('login'))
                    <div class="hidden top-0 me-xl-4 d-sm-flex d-md-flex d-lg-flex d-xxl-flex align-items-right xs:block float-end justify-content-end">
                        @auth
                        @if(Auth::user()->rol=='cliente')
                        <form action="{{ route('carritos.visualizar') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btncarrito text-white rounded-1 d-flex p-2 me-2 ml-2 mb-1 mb-sm-0 mb-md-0 mb-lg-0 mb-xl-0 align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-1 bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg>
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btncarrito text-white rounded-1 d-flex p-2 me-2 ml-2 mb-1 mb-sm-0 mb-md-0 mb-lg-0 mb-xl-0 align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                            </button>
                        </form>
                        <form action="{{ route('usuarios.visualizar', Auth::user()->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btncarrito text-white rounded-1 d-flex p-2 me-2 ml-2 mb-1 mb-sm-0 mb-md-0 mb-lg-0 mb-xl-0 align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                            </button>
                        </form>
                        @else
                        <div class="bglogin rounded-4 d-flex p-2 me-2 mb-1 mb-sm-0 mb-md-0 mb-lg-0 mb-xl-0 ">
                            <a href="{{ route('login') }}" class="text-sm text-light text-decoration-none">Login</a>
                        </div>
                        @if (Route::has('register'))
                        <div class="bglogin rounded-4 d-flex p-2 ml-2 align-items-center">
                            <a href="{{ route('register') }}" class="text-sm text-light text-decoration-none">Registrarse</a>
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>
                @endif
            </div>

        </div>
    </nav>

    @if(isset($mensaje))
    <div id="alerta" class="alert alert-warning alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('mensaje'))
    <div id="alerta" class="alert alert-warning alert-dismissible fade show" role="alert">
        <p>{{ session('mensaje') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @yield('content')

    <footer class="text-center text-lg-start bgfooter rounded-5 text-muted mt-3 mx-3 mb-3">
        <section class="">
            <div class="container text-center text-md-start mt-5 text-light pt-1">
                <div class="row mt-3">
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 py-2">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Derechos
                        </h6>
                        <p>Contenido perteneciente a TAD.</p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 py-2">
                        <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <p>Pablo Hidalgo Prados</p>
                        <p>Antonio José Guerrero Aguilar</p>
                        <p>Miguel Dzienisik</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center text-light p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset text-light fw-bold" href="https://upo.es/">UPO</a>
        </div>

    </footer>

    <!-- <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            myFunction()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script> -->
</body>

</html>