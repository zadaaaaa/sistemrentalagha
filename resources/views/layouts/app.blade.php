<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistem Rental Agha')</title>

    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="min-vh-100">
        <!-- Navbar Utama -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-semibold" href="{{ route('dashboard') }}">
                    Sistem Rental Agha
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-2">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-semibold' : '' }}" href="{{ route('categories.index') }}">
                                Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('items.*') ? 'active fw-semibold' : '' }}" href="{{ route('items.index') }}">
                                Barang
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <div class="container py-4">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
                <div>
                    <h1 class="h4 fw-bold text-dark mb-1">@yield('heading')</h1>
                    <p class="text-muted small mb-0">@yield('subheading')</p>
                </div>
                <div class="d-flex align-items-center">
                    @yield('actions')
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main class="container pb-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</body>
</html>
