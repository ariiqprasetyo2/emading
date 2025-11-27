<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Siswa - Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2196F3 0%, #1565C0 100%);
            --light-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text-primary: #1565C0;
            --text-secondary: #546e7a;
            --border-color: #e3f2fd;
        }
        
        body {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
        }
        
        .sidebar {
            background: var(--card-bg);
            border-right: 2px solid var(--border-color);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(33, 150, 243, 0.1);
        }
        
        .main-content { margin-left: 280px; padding: 2rem; }
        .brand { padding: 1.5rem; border-bottom: 2px solid var(--border-color); text-align: center; }
        
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
            background: var(--primary-gradient);
            color: white;
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(33, 150, 243, 0.3);
        }
        
        .nav-link i { width: 20px; margin-right: 1rem; }
        
        .guru-card {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 25px rgba(33, 150, 243, 0.1);
        }
        
        .table {
            color: var(--text-secondary);
            background: var(--card-bg);
            border: 2px solid var(--border-color);
        }
        
        .table tbody tr {
            background: var(--card-bg) !important;
            border-bottom: 1px solid var(--border-color);
        }
        
        .table td, .table th {
            border: 1px solid var(--border-color);
            padding: 12px;
        }
        
        .table-light {
            --bs-table-bg: var(--card-bg);
            --bs-table-border-color: var(--border-color);
        }
        
        .alert-success {
            background: rgba(76, 175, 80, 0.1);
            border: 2px solid rgba(76, 175, 80, 0.3);
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <div class="text-center mb-3">
                <img src="{{ asset('videos/1212.gif') }}" style="width: 100px; height: 100px;" alt="Logo">
            </div>
            <div class="text-center">
                <h4 class="mb-2"><i class="fas fa-chalkboard-teacher me-2"></i>Panel Guru</h4>
                <small style="color: var(--text-secondary);">E-Mading System</small>
            </div>
        </div>
        
        <div class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('guru.dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('articles.index') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>Baca Artikel
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('articles.create') }}" class="nav-link">
                    <i class="fas fa-pen"></i>Tulis Artikel
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('articles.my') }}" class="nav-link">
                    <i class="fas fa-file-alt"></i>Artikel Saya
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('guru.student-articles') }}" class="nav-link active">
                    <i class="fas fa-check-circle"></i>Artikel Murid
                </a>
            </div>

        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-0 fw-bold" style="color: var(--text-primary); font-size: 2.5rem;">E-MADING SMK BAKTI NUSANTARA 666</h1>
                <p class="mb-0 mt-2" style="color: var(--text-secondary); font-style: italic; font-size: 1.1rem;">"Kreatif, Inovatif, Unggul dan Mandiri!"</p>
            </div>
            <div class="d-flex align-items-center">
                <div class="bg-white rounded-3 p-3 shadow-sm" style="border: 2px solid var(--border-color);">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-circle fa-2x me-2" style="color: var(--text-primary);"></i>
                        <div>
                            <div class="fw-bold" style="color: var(--text-primary);">{{ auth()->user()->nama }}</div>
                            <div class="d-flex align-items-center">
                                <small style="color: var(--text-secondary);">{{ auth()->user()->role == 'siswa' ? 'Murid' : ucfirst(auth()->user()->role) }}</small>
                                <a href="{{ route('notifications.index') }}" class="text-decoration-none ms-2" style="color: var(--text-primary); font-size: 16px;" title="Notifikasi">
                                    <i class="fas fa-bell"></i>
                                </a>
                                <span class="mx-2" style="color: var(--text-primary);">|</span>
                                <a href="/logout" class="text-decoration-none" style="color: #f44336; font-size: 12px;">
                                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="guru-card">
            <h4 class="fw-bold mb-4" style="color: var(--text-primary);"><i class="fas fa-check-circle text-success me-2"></i>Review Artikel Murid</h4>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $index => $article)
                        <tr>
                            <td>{{ $articles->firstItem() + $index }}</td>
                            <td>
                                <strong>{{ Str::limit($article->judul, 30) }}</strong>
                                <br><small style="color: var(--text-secondary);">{{ Str::limit($article->isi, 50) }}</small>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $article->user_nama }}</span>
                                <br><small>Murid</small>
                            </td>
                            <td>{{ $article->nama_kategori }}</td>
                            <td>
                                <span class="badge bg-{{ $article->status == 'publish' ? 'success' : 'warning' }}">
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>
                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group-vertical btn-group-sm">
                                    <a href="{{ route('articles.show', $article->id_artikel) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    
                                    @if($article->status == 'draft')
                                        <form method="POST" action="{{ route('guru.articles.approve', $article->id_artikel) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i> Setujui
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('guru.articles.reject', $article->id_artikel) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-undo"></i> Draft
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{ $articles->links() }}
        </div>
    </div>
</body>
</html>