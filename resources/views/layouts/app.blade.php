<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F1F1F1;
        }

        .navbar-custom {
            background: linear-gradient(90deg, #0077B6, #48CAE4);
        }

        .navbar-brand h3 {
            color: #fff;
            font-weight: 900;
            margin: 0;
            padding: 0;
        }

        .navbar-brand span {
            color: #CAF0F8;
        }

        .menu_href {
            color: #fff !important;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
            padding: 8px 12px;
            border-radius: 6px;
        }

        .menu_href:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #FFD60A !important;
        }

        .li_menu {
            margin: 0 5px;
        }

        .dropdown-menu a {
            font-weight: 500;
            transition: background 0.2s ease;
        }

        .dropdown-menu a:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h3>Water<span>GO</span></h3>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-house-door me-1"></i> Home</a>
                    </li>
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-box-seam me-1"></i> Company</a>
                    </li>
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-building me-1"></i> Orders</a>
                    </li>
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-images me-1"></i> Banner</a>
                    </li>
                    <li class="nav-item li_menu">
                        <a class="nav-link menu_href" href="#"><i class="bi bi-chat-dots me-1"></i> Comments</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown li_menu">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle menu_href d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i class="bi bi-person me-1"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-1"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 container">
        @yield('content')
    </main>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
