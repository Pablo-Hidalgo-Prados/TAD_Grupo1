<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature Page</title>
    <link rel="icon" type="image/x-icon" href="/images/webicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body class="bggeneral">
    <nav class="navbar navbar-expand-md bgnavbar rounded-5 mt-3 mx-3" id="navbar">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand text-light" href="/index.html">
                    <img src="/images/webicon.png" alt="Icono de -nombre de web-" width="90" height="90" class="align-text-center">Nature Page
                </a>
            </div>
            <button class="navbar-toggler navbutton" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-dark"></span>
            </button>
            <div class="collapse navbar-collapse ml-2" id="navbarSupportedContent">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-light" href="/index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-light" href="/rift.html">Rutas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-light" href="/champs.html">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-light" href="/pro.html">Contacto</a>
                    </li>
                </ul>
            </div>
            @if (Route::has('login'))
            <div class="hidden fixed top-0 me-xl-4 py-1 d-flex align-items-center xs:block">
                @auth
                <div class="bglogin rounded-4 d-flex p-2 me-2">
                <a href="{{ url('/home') }}" class="text-sm text-light text-decoration-none">Home</a>
                </div>
                @else
                <div class="bglogin rounded-4 d-flex p-2 me-2">
                    <a href="{{ route('login') }}" class="text-sm text-light text-decoration-none">Login</a>
                </div>
                @if (Route::has('register'))
                <div class="bglogin rounded-4 d-flex p-2 ml-2">
                <a href="{{ route('register') }}" class="text-sm text-light text-decoration-none">Registrarse</a>
                </div>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </nav>

    @yield('content')

    <footer class="text-center text-lg-start bgfooter rounded-5 text-muted mt-3 mx-3">
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
                        <p>phidpra@alu.upo.es</p>
                        <p>@omega9937</p>
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