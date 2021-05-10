<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">

                @if ( Auth::guard('backend')->check() )
                <a class="navbar-brand" href="{{ route('backend.projects') }}">
                    <img src="{{ asset('images/logo.svg') }}" width="110" alt="">
                </a>
                @elseif ( Auth::guard('web')->check() )
                <a class="navbar-brand" href="{{ route('web.projects.index') }}">
                    <img src="{{ asset('images/logo.svg') }}" width="110" alt="">
                </a>
                @else
                <a class="navbar-brand" href="{{ route('web.portfolio.index') }}">
                    <img src="{{ asset('images/logo.svg') }}" width="110" alt="">
                </a>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if ( Auth::guard('backend')->check() && Route::is('backend.*'))
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('backend')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('backend.employees.show', ['employee' => Auth::guard('backend')->user()]) }}">
                                    Профиль
                                </a>
                                <a class="dropdown-item" href="{{ route('backend.projects') }}">
                                    Проекты
                                </a>
                                @if (Auth::guard('backend')->user()->is_admin)
                                <a class="dropdown-item" href="{{ route('backend.employees.index') }}">
                                    Сотрудники
                                </a>
                                <a class="dropdown-item" href="{{ route('backend.clients.index') }}">
                                    Клиенты
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('backend.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('backend.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @elseif ( Auth::guard('web')->check() )
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('web.client.show') }}">
                                    Профиль
                                </a>
                                <a class="dropdown-item" href="{{ route('web.projects.index') }}">
                                    Проекты
                                </a>
                                <a class="dropdown-item" href="{{ route('web.portfolio.index') }}">
                                    Портфолио
                                </a>
                                <a class="dropdown-item" href="{{ route('web.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('web.logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item login" href="{{ route('web.login') }}">Войти</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>