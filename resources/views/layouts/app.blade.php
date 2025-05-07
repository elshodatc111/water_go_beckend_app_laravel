<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu_href,.menu_href:hover{
            color:#8169F2;
            font-weight:600;
            margin:4 0 4 0;
        }
        .li_menu{
            background-color:#EDEBFC;
            margin: 2px;
            padding: 0 5px;
        }
    </style>
</head>
<body>
<div id="app">
    
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color:white">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h3 style="color:#80D3F3;font-weight:900;margin:0;padding:0">Water<span style="color:#0077B6"> GO</span></h3>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item li_menu" style="">
                        <a class="nav-link menu_href" href="#" style=""><i class="bi bi-house-door me-1"></i> Bosh sahifa</a>
                    </li>
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-box-seam me-1"></i> Buyurtmalar</a>
                    </li>
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-building me-1"></i> Kompaniyalar</a>
                    </li>
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-people me-1"></i> Hodimlar</a>
                    </li>
                </ul>

                <!-- Right Side -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
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

    <!-- Main Content -->
    <main class="py-4 container">
        @yield('content')
    </main>
</div>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
