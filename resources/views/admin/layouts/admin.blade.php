<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - HSRM</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <style>
        :root { --navy: #001B44; --gold: #C5A059; --gold-light: #d4b578; }
        body { background-color: #f4f5f7; }
        .sidebar { background-color: var(--navy); min-height: 100vh; width: 230px; position: fixed; top: 0; left: 0; }
        .sidebar .brand { color: var(--gold); font-weight: 800; letter-spacing: 2px; font-size: 1.3rem; }
        .sidebar a { color: #cfd8e3; text-decoration: none; display: block; padding: 10px 18px; border-radius: 8px; margin: 2px 10px; font-size: .92rem; }
        .sidebar a:hover, .sidebar a.active { background-color: rgba(197,160,89,.15); color: var(--gold); }
        .main-content { margin-left: 230px; padding: 25px 30px; }
        .topbar { background: #fff; border-radius: 12px; padding: 14px 22px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,.05); }
        .btn-gold { background-color: var(--gold); color: var(--navy); font-weight: 700; border: none; }
        .btn-gold:hover { background-color: var(--gold-light); color: var(--navy); }
        .card-stat { border: none; border-radius: 14px; box-shadow: 0 2px 10px rgba(0,0,0,.05); }
    </style>
</head>
<body>

    <div class="sidebar py-4">
        <div class="text-center mb-4"><span class="brand">HSRM Admin</span></div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">📊 Dashboard</a>

            @if(Route::has('admin.articles.index'))
            <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">📰 Artikel</a>
            @endif

            @if(Route::has('admin.products.index'))
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">🛍️ Produk</a>
            @endif

            @if(Route::has('admin.profile.index'))
            <a href="{{ route('admin.profile.index') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">🏢 Profil Perusahaan</a>
            @endif

            @if(Route::has('admin.gallery.index'))
            <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">🖼️ Galeri</a>
            @endif

            @if(Route::has('admin.reports.products'))
            <a href="{{ route('admin.reports.products') }}">🧾 Laporan PDF</a>
            @endif

            <hr style="border-color: rgba(255,255,255,.1);">
            <a href="{{ route('home') }}" target="_blank">🌐 Lihat Website</a>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-sm w-100" style="background:#7a1f1f; color:#fff; margin: 0 10px; width: calc(100% - 20px);">🚪 Logout</button>
            </form>
        </nav>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h5 class="mb-0 fw-bold" style="color: var(--navy);">@yield('page-title', 'Dashboard')</h5>
            <span class="text-muted small">👤 {{ session('admin_name') }}</span>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali isian form:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>