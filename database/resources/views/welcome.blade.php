<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Mading Sekolah Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .floating-card {
            animation: float 6s ease-in-out infinite;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 2rem;
        }
        .stats-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            transition: transform 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-10px);
        }
        .navbar-custom {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        .btn-gradient {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/">
            <i class="fas fa-newspaper me-2"></i>E-Mading Sekolah
        </a>
        <div class="navbar-nav ms-auto">
            <a href="/login" class="btn btn-outline-primary me-2">
                <i class="fas fa-sign-in-alt me-1"></i>Masuk
            </a>
            <a href="/register" class="btn btn-gradient">
                <i class="fas fa-user-plus me-1"></i>Daftar
            </a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-gradient d-flex align-items-center text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="mb-4">
                    <h1 class="display-3 fw-bold mb-4">
                        <i class="fas fa-newspaper text-warning me-3"></i>
                        E-Mading Digital
                    </h1>
                    <p class="lead mb-4 fs-4">
                        Platform mading sekolah modern yang menghubungkan seluruh warga sekolah dalam berbagi informasi, kreativitas, dan inspirasi.
                    </p>
                    <div class="d-flex gap-3 mb-4">
                        <a href="/login" class="btn btn-light btn-lg px-4 py-3">
                            <i class="fas fa-rocket me-2"></i>Mulai Sekarang
                        </a>
                        <a href="#features" class="btn btn-outline-light btn-lg px-4 py-3">
                            <i class="fas fa-info-circle me-2"></i>Pelajari Lebih
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="floating-card rounded-4 p-4 text-center">
                    <h3 class="mb-4"><i class="fas fa-users me-2"></i>Untuk Semua Warga Sekolah</h3>
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="bg-white bg-opacity-20 rounded-3 p-3">
                                <i class="fas fa-user-tie fa-2x mb-2"></i>
                                <h6>Admin</h6>
                                <small>Kelola Sistem</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-white bg-opacity-20 rounded-3 p-3">
                                <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>
                                <h6>Guru</h6>
                                <small>Buat Konten</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-white bg-opacity-20 rounded-3 p-3">
                                <i class="fas fa-graduation-cap fa-2x mb-2"></i>
                                <h6>Siswa</h6>
                                <small>Berkreasi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card stats-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="fw-bold text-primary">50+</h3>
                    <p class="text-muted mb-0">Pengguna Aktif</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h3 class="fw-bold text-success">120+</h3>
                    <p class="text-muted mb-0">Artikel Diterbitkan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="fw-bold text-warning">300+</h3>
                    <p class="text-muted mb-0">Komentar</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3 class="fw-bold text-info">15+</h3>
                    <p class="text-muted mb-0">Kategori</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Fitur Unggulan</h2>
            <p class="lead text-muted">Kemudahan dan kenyamanan dalam mengelola mading digital sekolah</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <h5 class="fw-bold">Editor Artikel</h5>
                        <p class="text-muted">Tulis dan edit artikel dengan mudah menggunakan editor yang user-friendly dan responsive.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5 class="fw-bold">Multi Role System</h5>
                        <p class="text-muted">Sistem role yang aman dengan hak akses berbeda untuk Admin, Guru, dan Siswa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="fw-bold">Dashboard Analytics</h5>
                        <p class="text-muted">Pantau statistik dan aktivitas dengan dashboard yang informatif dan real-time.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-3">Siap Memulai?</h2>
                <p class="lead mb-4">Bergabunglah dengan komunitas sekolah digital dan mulai berbagi kreativitas Anda hari ini!</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="/register" class="btn btn-light btn-lg px-4">
                        <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
                    </a>
                    <a href="/login" class="btn btn-outline-light btn-lg px-4">
                        <i class="fas fa-sign-in-alt me-2"></i>Sudah Punya Akun?
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5><i class="fas fa-newspaper me-2"></i>E-Mading Sekolah</h5>
                <p class="mb-0 text-muted">Platform mading digital untuk sekolah modern</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">&copy; 2024 E-Mading Sekolah. Semua hak dilindungi.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>