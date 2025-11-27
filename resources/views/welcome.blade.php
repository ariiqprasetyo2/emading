<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Publik - E-Mading</title>
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
        
        .article-card { 
            background: var(--card-bg); 
            border: 2px solid var(--border-color);
            border-radius: 15px; 
            margin-bottom: 20px; 
            box-shadow: 0 8px 25px rgba(33, 150, 243, 0.1); 
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
                <h4 class="mb-2"><i class="fas fa-globe me-2"></i>Panel Publik</h4>
                <small style="color: var(--text-secondary);">E-Mading System</small>
            </div>
        </div>
        
        <div class="nav-menu">
            <div class="nav-item">
                <a href="/" class="nav-link active">
                    <i class="fas fa-newspaper"></i>Baca Artikel
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-0 fw-bold" style="color: var(--text-primary); font-size: 2.5rem;">E-MADING SMK BAKTI NUSANTARA 666</h1>
                <p class="mb-0 mt-2" style="color: var(--text-secondary); font-style: italic; font-size: 1.1rem;">"Kreatif, Inovatif, Unggul dan Mandiri!"</p>
            </div>
            <div class="d-flex align-items-center">
                <div class="bg-white rounded-3 p-3 shadow-sm" style="border: 2px solid var(--border-color);">
                    <div class="d-flex align-items-center gap-2">
                        <a href="/login" class="btn btn-primary btn-sm">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                        <a href="/register" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-user-plus me-1"></i>Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Search Form -->
                <div class="article-card p-3 mb-4">
                    <form method="GET" action="/">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <input type="text" name="search" class="form-control" placeholder="Cari artikel..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="category" class="form-control">
                                    <option value="">Semua Kategori</option>
                                    @foreach(\App\Models\Category::all() as $cat)
                                        <option value="{{ $cat->id_kategori }}" {{ request('category') == $cat->id_kategori ? 'selected' : '' }}>
                                            {{ $cat->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                
                @if(isset($articles) && $articles->count() > 0)
                    <p class="mb-3" style="color: var(--text-secondary);">Menampilkan {{ $articles->count() }} dari {{ $articles->total() }} artikel</p>
                @endif
                
                @if(isset($articles))
                    @foreach($articles as $article)
                    <div class="article-card p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="fw-bold">{{ $article->judul }}</h5>
                                <small class="text-muted">
                                    <i class="fas fa-user"></i> {{ $article->user->nama }} ({{ $article->user->role == 'siswa' ? 'Murid' : ucfirst($article->user->role) }}) | 
                                    <i class="fas fa-tag"></i> {{ $article->category->nama_kategori }} | 
                                    <i class="fas fa-calendar"></i> {{ $article->created_at->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                        <p class="text-muted">{{ Str::limit($article->isi, 200) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-3">
                                <small class="text-muted">
                                    <i class="fas fa-comments"></i> {{ $article->comments->count() }} Komentar
                                </small>
                                <small class="text-muted">
                                    <i class="fas fa-heart text-danger"></i> {{ $article->likes->count() }} Like
                                </small>
                            </div>
                            <div>
                                <a href="{{ route('public.article', $article->id_artikel) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    @if(isset($articles))
                        {{ $articles->links() }}
                    @endif
                @else
                    <div class="article-card p-4 text-center">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <h5>Belum Ada Artikel</h5>
                        <p class="text-muted">Belum ada artikel yang dipublikasikan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>


</body>
</html>