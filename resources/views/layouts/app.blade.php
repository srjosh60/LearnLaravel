<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web Profile')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <style>
        :root {
            --navy: #081222;
            --gold: #b19139;
            --gold-light: #f0c96e;
        }
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: var(--navy);
        }
        .navbar-custom .navbar-brand {
            color: var(--gold) !important;
            font-weight: 800;
            font-size: 1.5rem;
            letter-spacing: 2px;
        }
        .navbar-custom .nav-link {
            color: #fff !important;
            font-weight: 500;
            letter-spacing: 1px;
        }
        .navbar-custom .nav-link:hover {
            color: var(--gold) !important;
        }
        .navbar-custom .nav-link.active {
            color: var(--gold) !important;
        }
        footer {
            background-color: var(--navy);
            color: #fff;
        }
        footer a {
            color: var(--gold);
            text-decoration: none;
        }
        .btn-gold {
            background-color: var(--gold);
            color: var(--navy);
            font-weight: 700;
            border: none;
        }
        .btn-gold:hover {
            background-color: var(--gold-light);
            color: var(--navy);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">Web Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border-color: #b19139;">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('projects') }}" class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.login') }}" class="nav-link" style="color: #b19139 !important; font-weight: 700;">⚙️ Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="py-4 mt-5">
        <div class="container text-center">
            <p class="mb-1" style="color: var(--gold); font-weight: 700; font-size: 1.2rem;">Web Profile</p>
            <p class="mb-1 text-white-50">Saut Josua Romartua</p>
            <p class="mb-0 text-white-50">&copy; 2026. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>