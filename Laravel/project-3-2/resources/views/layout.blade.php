<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature Hub</title>
    <link rel="icon" type="image/x-icon" href="/images/webicon_old_big.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body class="bggeneral">
    <nav class="navbar navbar-expand-md bgnavbar sticky-top rounded-5 mt-3 mx-3" id="navbar">
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
                        <div class="bglogin rounded-4 d-flex p-2 me-2 ml-4 mb-1 mb-sm-0 mb-md-0 mb-lg-0 mb-xl-0 align-items-center">
                            <a class="text-sm text-light text-decoration-none" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div class="bglogin rounded-4 d-flex p-2 ml-2 align-items-center">
                            <a href="{{ route('usuarios.visualizar', Auth::user()->id) }}" class="text-sm text-light text-decoration-none">Perfil</a>
                        </div>
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