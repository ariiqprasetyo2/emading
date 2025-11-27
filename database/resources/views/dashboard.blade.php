<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard E-Mading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card { border: none; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .stat-card { transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-2px); }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/dashboard">📰 E-Mading</a>
        <div class="navbar-nav ms-auto">
            <span class="navbar-text me-3">{{ auth()->user()->nama }} | {{ ucfirst(auth()->user()->role) }}</span>
            <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="mb-1">Dashboard {{ ucfirst(auth()->user()->role) }}</h3>
            <p class="text-muted">Selamat datang, {{ auth()->user()->nama }}</p>
        </div>
    </div>

    <div class="row g-3">
        @if(auth()->user()->role == 'admin')
            <div class="col-md-3">
                <div class="card stat-card bg-primary text-white">
                    <div class="card-body text-center">
                        <h2 class="mb-0">{{ \App\Models\User::count() }}</h2>
                        <small>Total User</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-success text-white">
                    <div class="card-body text-center">
                        <h2 class="mb-0">{{ \App\Models\Artikel::count() }}</h2>
                        <small>Total Artikel</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-warning text-white">
                    <div class="card-body text-center">
                        <h2 class="mb-0">{{ \App\Models\Artikel::where('status', 'publish')->count() }}</h2>
                        <small>Published</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card bg-info text-white">
                    <div class="card-body text-center">
                        <h2 class="mb-0">{{ \App\Models\Artikel::where('status', 'draft')->count() }}</h2>
                        <small>Draft</small>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-4">
                <div class="card stat-card bg-primary text-white">
                    <div class="card-body text-center">
                        <h2 class="mb-0">{{ \App\Models\Artikel::where('id_user', auth()->user()->id_user)->count() }}</h2>
                        <small>Artikel Saya</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-success text-white">
                    <div class="card-body text-center">
                        <h2 class="mb-0">{{ \App\Models\Artikel::where('id_user', auth()->user()->id_user)->where('status', 'publish')->count() }}</h2>
                        <small>Published</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card bg-warning text-white">
                    <div class="card-body text-center">
                        <h2 class="mb-0">{{ \App\Models\Artikel::where('id_user', auth()->user()->id_user)->where('status', 'draft')->count() }}</h2>
                        <small>Draft</small>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h6 class="mb-0">Menu Utama</h6>
                </div>
                <div class="card-body">
                    @if(auth()->user()->role == 'admin')
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary">👥 Kelola User</a>
                            <a href="#" class="btn btn-outline-success">📄 Kelola Artikel</a>
                            <a href="#" class="btn btn-outline-info">📂 Kelola Kategori</a>
                        </div>
                    @else
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-primary">📖 Baca Artikel</a>
                            <a href="#" class="btn btn-outline-success">✏️ Tulis Artikel</a>
                            <a href="#" class="btn btn-outline-info">📝 Artikel Saya</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <h6 class="mb-0">Info Sistem</h6>
                </div>
                <div class="card-body">
                    <small class="text-muted">
                        <div>Role: <strong>{{ ucfirst(auth()->user()->role) }}</strong></div>
                        <div>Username: <strong>{{ auth()->user()->username }}</strong></div>
                        <div>Login: <strong>{{ now()->format('d/m/Y H:i') }}</strong></div>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>