<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <div class="box">
                <div class="left">
                    <a href="{{url('/')}}">
                        <div class="logo">
                            <img src="https://www.ilcannolo.com/wp-content/uploads/2020/09/food-ico_Tavola-disegno-1.png" alt="DeliveBoo Logo">
                        </div>
                        <div class="title">DeliveBoo</div>
                    </a>
                    <nav>
                        <ul>
                        @if(Auth::user() != null)
                            <li >
                                <a href="{{ route('products.index') }}">Prodotti</a>
                            </li>
                        @endif
                        @if(Auth::user() != null && Auth::user()->admin)
                            <li >
                                <a href="{{ route('typologies.index') }}">Tipologie</a>
                            </li>
                        @endif
                        </ul>
                    </nav>
                </div>
                <div class="right">
                    <ul>
                    @if(!Auth::user())
                        <li >
                            <a href="/login">Accedi</a>
                        </li>
                        <li>
                            <a href="/register">Registrati</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i> Esci
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif
                    </ul>
                </div>
            </div>
        </header>
        <main class="py-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
