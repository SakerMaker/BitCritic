<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BitCritic - Video Game Reviewing Community') }} - @yield('template_title')</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{url("/favicon.ico")}}" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'BitCritic - Video Game Reviewing Community') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url("img/Logo Blanco.png") }}" alt="Logo" width="100" height="100"
              class="d-inline-block align-text-top me-2 img-not-hover">
            <img src="{{ url("img/Logo-Blanco2.gif") }}" alt="Logo" width="100" height="100" class="align-text-top me-2 img-hover">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('/')) ? 'nav-link--active' : '' }}" href="{{ url('/') }}">Inicio</a>
              </li>
              @if (request()->is('games') || request()->is('games/search'))
              <li class="nav-item">
                <a class="nav-link nav-link--active" href="{{ url('/games') }}">Juegos</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/games') }}">Juegos</a>
              </li>
              @endif

            @guest
              @if (str_contains(URL::current(),"login") || !(str_contains(URL::current(),"register")))
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(URL::current(),"login") ? 'nav-link--active' : '' }}" href="{{ url('/login') }}">Iniciar Sesión</a>
                </li>
              @else
                  <li class="nav-item">
                    <a class="nav-link {{ str_contains(URL::current(),"register") ? 'nav-link--active' : '' }}" href="{{ url('/register') }}">Registrarse</a>
                    </li>
              @endif
                
            @else
              @if (isset($user) && Auth::id()==$user->id)
              <li class="nav-item">
                <a class="nav-link nav-link--active" href="{{url("/perfil"). "/" .Auth::id()}}">Mi Perfil</a>
              </li>
              @else 
              <li class="nav-item">
                <a class="nav-link" href="{{url("/perfil"). "/" .Auth::id()}}">Mi Perfil</a>
              </li>
              @endif
            @endguest
            @can('delete-users')
            <li class="nav-item">
              <a class="nav-link {{ str_contains(URL::current(),"panel") ? 'nav-link--active' : '' }}" href="{{ url('/panel') }}">Panel Administración</a>
            </li>
            @endcan
            </ul>
          </div>
        </div>
      </nav>

      <main class="main-content-view bg-dark">
        <section class="bg-dark">
            <div class="container">
        @yield('content')
            </div>
        </section>
      </main>

      <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; BitCritic 2023</div></div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Política de Privacidad</a>
                    @guest
                        
                    @else
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="{{ url("/logout")}}">Cerrar Sesión</a>
                    @endguest
                    
                </div>
            </div>
        </div>
        </footer>
</body>
</html>