<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nature Hub</title>
    <link rel="icon" type="image/x-icon" href="/images/webicon_old_big.ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>

<body class="bggeneral">
    <div id="app">
        <nav class="navbar navbar-expand-md bgnavbar navbar-light sticky shadow-sm">
            <div class="container">
                <div>
                    <a class="navbar-brand text-light" href="/">
                        <img src="/images/webicon.png" alt="Icono de -nombre de web-" width="90" height="90" class="align-text-center">Nature Hub
                    </a>
                </div>
                <button class="navbar-toggler navbutton" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-dark"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">@lang('messages.template_info_1')</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">@lang('messages.template_info_2')</a>
                        </li>
                        @endif
                        @else
                        @if (Auth::user()->email_verified_at)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('messages.template_info_3')</a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endif
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4">
            @yield('content')
        </main>
    </div>


</body>

</html>