<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --dark-bg: #1a1d29;
            --card-bg: #252836;
            --text-primary: #ffffff;
            --text-secondary: #8b949e;
            --border-color: #30363d;
        }
        
        body {
            background: var(--dark-bg);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
        }
        
        .sidebar {
            background: var(--card-bg);
            border-right: 1px solid var(--border-color);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            z-index: 1000;
        }
        
        .main-content { margin-left: 280px; padding: 2rem; }
        .brand { padding: 1.5rem; border-bottom: 1px solid var(--border-color); text-align: center; }
        
        .brand h4 {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            font-weight: 700;
        }
        
        .nav-menu { padding: 1rem 0; }
        .nav-item { margin: 0.5rem 1rem; }
        
        .nav-link {
            color: var(--text-secondary);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            transform: translateX(5px);
        }
        
        .nav-link i { width: 20px; margin-right: 1rem; }
        
        .admin-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        
        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <h4><i class="fas fa-shield-alt me-2"></i>Admin Panel</h4>
            <small class="text-light">E-Mading System</small>
        </div>
        
        <div class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.categories') }}" class="nav-link">
                    <i class="fas fa-tags"></i>Kelola Kategori
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.articles') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>Verifikasi Artikel
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link">
                    <i class="fas fa-users"></i>Kelola User
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.reports') }}" class="nav-link active">
                    <i class="fas fa-chart-bar"></i>Laporan
                </a>
            </div>
            <div class="nav-item mt-4">
                <a href="/logout" class="nav-link" style="color: #fa709a;">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2 class="text-white mb-4"><i class="fas fa-chart-bar me-2"></i>Laporan Sistem</h2>

        <div class="row g-4">
            <!-- User Statistics -->
            <div class="col-md-6">
                <div class="admin-card">
                    <h5 class="fw-bold mb-4 text-white"><i class="fas fa-users text-primary me-2"></i>Statistik Users</h5>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="text-center p-3 bg-primary bg-opacity-10 rounded">
                                <h3 class="fw-bold text-primary">{{ $data['users_stats']['total'] }}</h3>
                                <small class="text-white">Total Users</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-success bg-opacity-10 rounded">
                                <h3 class="fw-bold text-success">{{ $data['users_stats']['siswa'] }}</h3>
                                <small class="text-white">Siswa</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-warning bg-opacity-10 rounded">
                                <h3 class="fw-bold text-warning">{{ $data['users_stats']['guru'] }}</h3>
                                <small class="text-white">Guru</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-danger bg-opacity-10 rounded">
                                <h3 class="fw-bold text-danger">{{ $data['users_stats']['admin'] }}</h3>
                                <small class="text-white">Admin</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Statistics -->
            <div class="col-md-6">
                <div class="admin-card">
                    <h5 class="fw-bold mb-4 text-white"><i class="fas fa-newspaper text-success me-2"></i>Statistik Artikel</h5>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="text-center p-3 bg-info bg-opacity-10 rounded">
                                <h3 class="fw-bold text-info">{{ $data['articles_stats']['total'] }}</h3>
                                <small class="text-white">Total Artikel</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-success bg-opacity-10 rounded">
                                <h3 class="fw-bold text-success">{{ $data['articles_stats']['published'] }}</h3>
                                <small class="text-white">Published</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-warning bg-opacity-10 rounded">
                                <h3 class="fw-bold text-warning">{{ $data['articles_stats']['draft'] }}</h3>
                                <small class="text-white">Draft</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-primary bg-opacity-10 rounded">
                                <h3 class="fw-bold text-primary">{{ $data['activity_stats']['total_comments'] }}</h3>
                                <small class="text-white">Komentar</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Articles by Category -->
            <div class="col-md-6">
                <div class="admin-card">
                    <h5 class="fw-bold mb-4 text-white"><i class="fas fa-tags text-warning me-2"></i>Artikel per Kategori</h5>
                    @foreach($data['articles_stats']['by_category'] as $category)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-white">{{ $category->nama_kategori }}</span>
                        <span class="badge bg-primary">{{ $category->articles_count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Articles -->
            <div class="col-md-6">
                <div class="admin-card">
                    <h5 class="fw-bold mb-4 text-white"><i class="fas fa-clock text-info me-2"></i>Artikel Terbaru</h5>
                    @foreach($data['articles_stats']['recent'] as $article)
                    <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded" style="background: rgba(102, 126, 234, 0.1);">
                        <div>
                            <strong class="text-white">{{ Str::limit($article->judul, 25) }}</strong>
                            <br><small style="color: #8b949e;">{{ $article->user_nama }} - {{ $article->nama_kategori }}</small>
                        </div>
                        <span class="badge bg-{{ $article->status == 'publish' ? 'success' : 'warning' }}">
                            {{ ucfirst($article->status) }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Monthly Activity -->
            <div class="col-12">
                <div class="admin-card">
                    <h5 class="fw-bold mb-4 text-white"><i class="fas fa-calendar text-success me-2"></i>Aktivitas Bulan Ini</h5>
                    <div class="row g-4 text-center">
                        <div class="col-md-4">
                            <div class="p-4 bg-primary bg-opacity-10 rounded">
                                <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                                <h3 class="fw-bold text-white">{{ $data['activity_stats']['articles_this_month'] }}</h3>
                                <p class="mb-0 text-white">Artikel Baru</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 bg-success bg-opacity-10 rounded">
                                <i class="fas fa-user-plus fa-3x text-success mb-3"></i>
                                <h3 class="fw-bold text-white">{{ $data['activity_stats']['users_this_month'] }}</h3>
                                <p class="mb-0 text-white">User Baru</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 bg-info bg-opacity-10 rounded">
                                <i class="fas fa-comments fa-3x text-info mb-3"></i>
                                <h3 class="fw-bold text-white">{{ $data['activity_stats']['total_comments'] }}</h3>
                                <p class="mb-0 text-white">Total Komentar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>