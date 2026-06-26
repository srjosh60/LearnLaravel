<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - HSRM</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <style>
        :root {
            --navy: #001B44;
            --gold: #C5A059;
            --gold-light: #d4b578;
        }
        body {
            background: linear-gradient(135deg, #0a1628, #1a2d4a);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,.35);
        }
        .login-side {
            background-color: var(--navy);
            color: #fff;
            padding: 50px 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }
        .login-side h2 {
            color: var(--gold);
            font-weight: 800;
            letter-spacing: 2px;
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <div class="login-card row g-0">
                    <div class="col-md-5 d-none d-md-block">
                        <div class="login-side">
                            <h2>HSRM</h2>
                            <p class="text-white-50">Panel Administrator untuk mengelola konten website Company Profile HSRM.</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="p-4 p-md-5">
                            <h4 class="fw-bold mb-1" style="color: var(--navy);">Login Admin</h4>
                            <p class="text-muted mb-4">Masuk untuk mengelola website</p>

                            @if (session('success'))
                                <div class="alert alert-success py-2">{{ session('success') }}</div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger py-2">{{ session('error') }}</div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger py-2">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.login.submit') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="admin@hsrm.com" required autofocus>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                                </div>
                                <button type="submit" class="btn btn-gold w-100 py-2">Login</button>
                            </form>

                            <p class="text-center text-muted small mt-4 mb-0">
                                <a href="{{ route('home') }}" class="text-decoration-none">← Kembali ke Website</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>