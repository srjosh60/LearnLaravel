<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Web Profile</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            background: url('https://images.unsplash.com/photo-1562774053-701939374585?w=1920') center/cover no-repeat fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.65);
            z-index: 0;
        }
        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }
        .login-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .login-header {
            background: linear-gradient(135deg, #f5c518, #e6b800);
            padding: 30px;
            text-align: center;
        }
        .login-header h4 {
            color: #1a1a2e;
            font-weight: 800;
            font-size: 1.4rem;
            margin: 0;
            letter-spacing: 1px;
        }
        .login-header p {
            color: #1a1a2e;
            margin: 5px 0 0;
            font-size: 0.85rem;
            opacity: 0.8;
        }
        .login-body {
            padding: 35px 30px;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            font-size: 0.95rem;
        }
        .form-control:focus {
            border-color: #f5c518;
            box-shadow: 0 0 0 3px rgba(245,197,24,0.2);
        }
        .btn-login {
            background: linear-gradient(135deg, #f5c518, #e6b800);
            color: #1a1a2e;
            font-weight: 700;
            padding: 12px;
            border-radius: 8px;
            border: none;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245,197,24,0.4);
            color: #1a1a2e;
        }
        .login-footer {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            font-size: 0.8rem;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div style="font-size: 2.5rem; margin-bottom: 10px;">🎓</div>
                <h4>ADMIN LOGIN</h4>
                <p>Universitas Pamulang - Sistem Informasi</p>
            </div>
            <div class="login-body">
                @if($errors->any())
                <div class="alert alert-danger py-2 mb-3">
                    {{ $errors->first() }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger py-2 mb-3">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('admin.login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@example.com" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-login">🔐 Login</button>
                </form>
            </div>
            <div class="login-footer">
                &copy; 2026 Web Profile | NIM: 241011750145
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>