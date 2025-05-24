<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mina San Pedro')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logoMinaSanPedro.png') }}" type="image/png" sizes="32x32" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="border-radius: 0 0 16px 16px;">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="gap: 18px;">
                    <img src="{{ asset('images/logoMinaSanPedro.png') }}" alt="Logo Mina San Pedro" style="height: 54px; width: 54px; border-radius: 50%; box-shadow: 0 2px 8px rgba(0,0,0,0.08); object-fit: cover; display: inline-block;">
                    <span style="font-weight: 800; color: #007bff; font-size: 1.55em; letter-spacing: 1px; font-family: 'Nunito', 'Segoe UI', Arial, sans-serif; text-shadow: 0 2px 8px rgba(0,123,255,0.08); display: inline-block; vertical-align: middle;">Mina San Pedro</span>
                </a>
                <!-- Menú derecho solo si el usuario está autenticado -->
                @auth
                    <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                @endauth
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
