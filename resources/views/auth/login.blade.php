<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - E-Mading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #87ceeb 100%);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 700px;
            min-height: 380px;
        }
        .login-left {
            background: linear-gradient(135deg, #2196F3 0%, #1565C0 100%);
            color: white;
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .login-right {
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-control {
            border: 2px solid #e3f2fd;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #2196F3;
            box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg, #2196F3 0%, #1565C0 100%);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(33, 150, 243, 0.3);
        }
        .logo-animation {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
        }
        .welcome-text {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .form-label {
            font-weight: 600;
            color: #1565C0;
            margin-bottom: 8px;
        }
        .alert {
            border-radius: 12px;
            border: none;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="row g-0 h-100">
            <div class="col-lg-5 login-left">
                <img src="{{ asset('videos/1212.gif') }}" class="logo-animation" alt="Logo">
                <h1 class="welcome-text">E-MADING</h1>
                <h2 class="h4 mb-3">SMK BAKTI NUSANTARA 666</h2>
                <p class="mb-4 opacity-75">"Kreatif, Inovatif, Unggul dan Mandiri!"</p>
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <i class="fas fa-newspaper fa-2x opacity-75"></i>
                    <i class="fas fa-users fa-2x opacity-75"></i>
                    <i class="fas fa-graduation-cap fa-2x opacity-75"></i>
                </div>
            </div>
            <div class="col-lg-7 login-right">
                <div class="text-center mb-3">
                    <h4 class="fw-bold" style="color: #1565C0;">Selamat Datang Kembali!</h4>
                    <p class="text-muted mb-0">Masuk ke akun E-Mading Anda</p>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: #e3f2fd; border: 2px solid #e3f2fd; border-right: none;">
                                <i class="fas fa-user" style="color: #2196F3;"></i>
                            </span>
                            <input type="text" name="username" class="form-control" style="border-left: none;" placeholder="Masukkan username Anda" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: #e3f2fd; border: 2px solid #e3f2fd; border-right: none;">
                                <i class="fas fa-lock" style="color: #2196F3;"></i>
                            </span>
                            <input type="password" name="password" class="form-control" id="password" style="border-left: none; border-right: none;" placeholder="Masukkan password Anda" required>
                            <button class="btn" type="button" id="togglePassword" style="background: #e3f2fd; border: 2px solid #e3f2fd; border-left: none;">
                                <i class="fas fa-eye" id="eyeIcon" style="color: #2196F3;"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-login text-white w-100 mb-3">
                        <i class="fas fa-sign-in-alt me-2"></i>Masuk ke E-Mading
                    </button>
                </form>
                
                <div class="text-center">
                    <p class="text-muted mb-3">Belum punya akun?</p>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="/register" class="btn btn-outline-primary" style="border-radius: 12px; padding: 12px 30px;">
                            <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                        </a>
                        <a href="/" class="btn btn-outline-secondary" style="border-radius: 12px; padding: 12px 30px;">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>
</body>
</html>