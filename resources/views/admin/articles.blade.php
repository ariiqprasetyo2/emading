<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Artikel - Admin</title>
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
        
        .main-content {
            margin-left: 280px;
            padding: 2rem;
        }
        
        .brand {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            text-align: center;
        }
        
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
        
        .table-dark {
            --bs-table-bg: var(--card-bg);
            --bs-table-border-color: var(--border-color);
        }
        
        .table {
            color: var(--text-secondary);
            background: var(--card-bg);
            border: 1px solid var(--border-color);
        }
        
        .table tbody tr {
            background: var(--card-bg) !important;
            border-bottom: 1px solid var(--border-color);
        }
        
        .table td, .table th {
            border: 1px solid var(--border-color);
            padding: 12px;
        }
        
        .alert-success {
            background: rgba(67, 233, 123, 0.1);
            border: 1px solid rgba(67, 233, 123, 0.3);
            color: #43e97b;
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
                <a href="{{ route('admin.articles') }}" class="nav-link active">
                    <i class="fas fa-newspaper"></i>Verifikasi Artikel
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link">
                    <i class="fas fa-users"></i>Kelola User
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.reports') }}" class="nav-link">
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
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="admin-card p-4">
            <h4 class="fw-bold mb-4 text-white"><i class="fas fa-check-circle text-warning me-2"></i>Verifikasi & Kelola Artikel</h4>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
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
                                <br><small class="text-muted">{{ Str::limit($article->isi, 50) }}</small>
                            </td>
                            <td>
                                <span class="badge bg-{{ $article->user_role == 'admin' ? 'dark' : ($article->user_role == 'guru' ? 'success' : 'primary') }}">
                                    {{ $article->user_nama }}
                                </span>
                                <br><small>{{ ucfirst($article->user_role) }}</small>
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
                                    <a href="{{ route('articles.show', $article->id_artikel) }}" class="btn btn-info btn-sm" target="_blank">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    
                                    @if($article->status == 'draft')
                                        <form method="POST" action="{{ route('admin.articles.approve', $article->id_artikel) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i> Setujui
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.articles.reject', $article->id_artikel) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-undo"></i> Draft
                                            </button>
                                        </form>
                                    @endif
                                    
                                    <form method="POST" action="{{ route('admin.articles.delete', $article->id_artikel) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
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