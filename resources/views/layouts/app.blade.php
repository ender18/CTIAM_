<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bienvenido - CTIAM</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}" defer></script>
    <script src="{{ asset('js/myjs.js') }}" defer></script>
    <script src="{{ asset('js/toastr.min.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/4aac046800.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="//unpkg.com/leaflet/dist/leaflet.css" />
    <script src="//unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="//unpkg.com/vue2-leaflet"></script>

    @yield('cssandjs')


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">

    <!-- Styles -->


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap4-toggle.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm  ">
            <div class="container">
              @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img src="{{ asset('images/logo_ctiam.png') }}" alt="" class="img img-fluid">
                </a>

                @else
                  <a class="navbar-brand" href="{{ route('home')}}">
                    <img src="{{ asset('images/logo_ctiam.png') }}" alt="" class="img img-fluid">
                  </a>
              @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="mr-3">
                              <a class="nav-link text-white" href="{{ route('conocenos')}}">Conócenos</a>
                            </li>
                            <li class="mr-3">
                              <a class="nav-link text-white" href="{{ route('miembros')}}">Nuestros Miembros</a>
                            </li>
                            <li class="mr-3">
                              <a class="nav-link text-white" href="{{ route('fundadoras')}}">Fundadoras</a>
                            </li>
                            <li class="mr-3">
                              <a class="nav-link text-white" href="{{ route('focos')}}">Focos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}"><button class="btn btn-light">Inicia Sesión</button></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}"><button class="btn btn-dark">¡Registrate!</button></a>
                                </li>
                            @endif
                        @else
                          <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <span class="caret">Página principal</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('welcome')}}">Inicio</a>
                                <a class="dropdown-item" href="{{ route('conocenos')}}">Conócenos</a>
                                <a class="dropdown-item" href="{{ route('miembros')}}">Nuestros Miembros</a>
                                <a class="dropdown-item" href="{{ route('fundadoras')}}">Fundadoras</a>
                                <a class="dropdown-item" href="{{ route('focos')}}">Focos</a>
                            </div>
                          </li>
                            <li class="mr-3">
                              <a class="nav-link text-white" href="{{ route('home')}}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <a class="dropdown-item" href="/viewchangePassword">
                                        Cambiar Contraseña
                                      </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <div class="py-4 bg-white shadow">
            @yield('content')
        </div>
        <footer-component></footer-component>

    </div>
<!-- Footer -->
</body>
</html>
