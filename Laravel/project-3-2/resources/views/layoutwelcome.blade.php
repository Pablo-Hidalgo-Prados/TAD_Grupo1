<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

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

            $('.ir-arriba').click(function() {
                $('body, html').animate({
                    scrollTop: '0px'
                }, 300);
            });

            $(window).scroll(function() {
                if ($(this).scrollTop() > 0) {
                    $('.ir-arriba').slideDown(300);
                } else {
                    $('.ir-arriba').slideUp(300);
                }
            });
        });
    </script>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body class="bggeneral">
    <nav class="navbar navbar-expand-md bgnavbar sticky p-0 opacity" id="navbar">
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

                    <ul class="nav flex-grow-1 list-unstyled d-block d-md-none">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="/">@lang('messages.nav_1')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('rutas') }}">@lang('messages.nav_2')</a>
                        </li>

                        @if(isset(Auth::user()->id))
                        @if(Auth::user()->rol=='admin')
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="/panel">@lang('messages.nav_3')</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('productos.vista') }}">@lang('messages.nav_4')</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('productos.vista') }}">@lang('messages.nav_4')</a>
                        </li>
                        @endif
                    </ul>

                    <ul class="nav flex-grow-1 d-none d-md-flex">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="/">{{ __('messages.nav_1') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('rutas') }}">@lang('messages.nav_2')</a>
                        </li>

                        @if(isset(Auth::user()->id))
                        @if(Auth::user()->rol=='admin')
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="/panel">@lang('messages.nav_3')</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('productos.vista') }}">@lang('messages.nav_4')</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-light" href="{{ route('productos.vista') }}">@lang('messages.nav_4')</a>
                        </li>
                        @endif
                    </ul>
                    @if (Route::has('login'))
                    <div class="hidden top-0 me-xl-4 d-sm-block d-md-flex d-lg-flex d-xxl-flex align-items-right xs:block float-end justify-content-end">

                        @if (app()->getLocale() === 'es')

                        <div class="me-3">
                            <a href="{{ route('language.swap', 'en') }}"><img src="https://em-content.zobj.net/thumbs/120/twitter/322/flag-united-kingdom_1f1ec-1f1e7.png" srcset="https://em-content.zobj.net/thumbs/240/twitter/322/flag-united-kingdom_1f1ec-1f1e7.png 2x" width="40" height="40"></a>
                        </div>
                        @else

                        <div class="flag me-3 mb-1 mb-sm-1">
                            <a href="{{ route('language.swap', 'es') }}"><span class="red stripe"></span></a>
                            <a href="{{ route('language.swap', 'es') }}"><span class="yellow stripe"></span></a>
                            <a href="{{ route('language.swap', 'es') }}"><span class="red stripe"></span></a>
                        </div>

                        @endif
                        @auth
                        @if(Auth::user()->rol=='cliente')
                        <form action="{{ route('carritos.visualizar') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btncarrito text-white rounded-1 d-flex p-2 me-2 ml-2 mb-1 mb-sm-1 mb-md-0 mb-lg-0 mb-xl-0 align-items-center" data-bs-toggle="tooltip" data-bs-title="@lang('messages.info_icon_1')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg>
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btncarrito text-white rounded-1 d-flex p-2 me-2 ml-2 mb-1 mb-sm-1 mb-md-0 mb-lg-0 mb-xl-0 align-items-center" data-bs-toggle="tooltip" data-bs-title="@lang('messages.info_icon_2')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                            </button>
                        </form>
                        <form action="{{ route('usuarios.visualizar', Auth::user()->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btncarrito text-white rounded-1 d-flex p-2 me-2 ml-2 mb-1 mb-sm-1 mb-md-0 mb-lg-0 mb-xl-0 align-items-center" data-bs-toggle="tooltip" data-bs-title="@lang('messages.info_icon_3')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </button>
                        </form>
                        @else
                        <div class="bglogin rounded-4 p-2 me-0 me-md-2 me-lg-2 mb-1 mb-sm-1 mb-md-0 mb-lg-0 mb-xl-0 text-center">
                            <a href="{{ route('login') }}" class="text-sm text-light text-decoration-none">@lang('messages.nav_btn_1')</a>
                        </div>
                        @if (Route::has('register'))
                        <div class="bglogin rounded-4 p-2 ml-2 mb-1 mb-sm-1 mb-md-0 mb-lg-0 mb-xl-0 align-items-center">
                            <a href="{{ route('register') }}" class="text-sm text-light text-decoration-none">@lang('messages.nav_btn_2')</a>
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
    <div id="alerta" class="bglogin rounded-4 alert alert-dismissible fade show m-3" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('mensaje'))
    <div id="alerta" class="bglogin rounded-4 alert alert-dismissible fade show m-3" role="alert">
        <p>{{ session('mensaje') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-none d-sm-block">
        <button class="ir-arriba btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
            </svg>
        </button>
    </div>

    @yield('content')

    <footer class="text-center text-lg-start bgfooter text-muted">
        <section class="">
            <div class="container text-center text-md-start text-light pt-1">
                <div class="row mt-3">
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 py-2">
                        <h6 class="text-uppercase fw-bold mb-4">@lang('messages.footer_info_1')</h6>
                        <p>@lang('messages.footer_info_2')</p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 py-2">
                        <h6 class="text-uppercase fw-bold mb-4">@lang('messages.footer_info_3')</h6>
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

    <script>
        $(document).ready(function() {
            $("body").tooltip({
                selector: '[data-bs-toggle=tooltip]'
            });
        });
    </script>
</body>

</html>