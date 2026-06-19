<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-admin { background-color: #f5c518; }
        .navbar-admin .navbar-brand {
            color: #1a1a2e !important;
            font-weight: 800;
            font-size: 1rem;
        }
        .navbar-admin .nav-link { color: #1a1a2e !important; font-weight: 600; }
        .sidebar {
            min-height: 100vh;
            background-color: #1a1a2e;
            padding-top: 20px;
        }
        .sidebar h6 {
            color: #f5c518;
            font-weight: 700;
            padding: 10px 20px;
            letter-spacing: 2px;
            font-size: 0.8rem;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 10px 20px;
            font-weight: 500;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #f5c518;
            background: rgba(245,197,24,0.1);
        }
        .main-content { padding: 30px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-admin navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                🎓 Universitas Pamulang - SISTEM INFORMASI
            </a>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link" style="color: #1a1a2e !important; font-weight: 600; text-decoration: none;">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0 sidebar">
                <h6>ADMIN MENU</h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            📊 Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}">
                            📁 Data Project
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            👥 Data User
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // Setup CSRF token untuk semua AJAX request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>
</html>