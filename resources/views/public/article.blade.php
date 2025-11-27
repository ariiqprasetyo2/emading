<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->judul }} - E-Mading</title>
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
        
        .comment-card {
            background: rgba(248, 249, 250, 0.8);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            margin-bottom: 15px;
        }
        
        .menu-card {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(33, 150, 243, 0.1);
            position: sticky;
            top: 2rem;
        }
        
        .login-prompt {
            background: var(--primary-gradient);
            color: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
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
                <a href="/" class="nav-link">
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
        
        <div class="row">
            <div class="col-md-8">
                <div class="article-card p-4 mb-4">
                    <h2 class="fw-bold mb-3">{{ $article->judul }}</h2>
                    <div class="mb-3">
                        <small class="text-muted">
                            <i class="fas fa-user"></i> {{ $article->user->nama }} ({{ $article->user->role == 'siswa' ? 'Murid' : ucfirst($article->user->role) }}) | 
                            <i class="fas fa-tag"></i> {{ $article->category->nama_kategori }} | 
                            <i class="fas fa-calendar"></i> {{ $article->created_at->format('d M Y H:i') }} |
                            <span class="badge bg-success">Published</span>
                        </small>
                    </div>
                    
                    @if($article->foto)
                        <img src="{{ asset('storage/' . $article->foto) }}" class="img-fluid rounded mb-3" alt="{{ $article->judul }}">
                    @endif
                    
                    <div class="article-content" style="line-height: 1.8; font-size: 16px;">
                        {!! nl2br(e($article->isi)) !!}
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top: 1px solid var(--border-color);">
                        <div class="d-flex gap-3">
                            <small class="text-muted">
                                <i class="fas fa-comments"></i> {{ $article->comments->count() }} Komentar
                            </small>
                            <small class="text-muted">
                                <i class="fas fa-heart text-danger"></i> {{ $article->likes->count() }} Like
                            </small>
                        </div>
                        <div class="login-prompt d-inline-block" style="padding: 10px 15px; margin: 0;">
                            <small>Login untuk like artikel</small>
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="article-card p-4">
                    <h5 class="fw-bold mb-3"><i class="fas fa-comments"></i> Komentar ({{ $article->comments->count() }})</h5>
                    
                    <!-- Login Prompt for Comments -->
                    <div class="login-prompt mb-4">
                        <h6><i class="fas fa-comment me-2"></i>Ingin berkomentar?</h6>
                        <p class="mb-3">Login untuk bergabung dalam diskusi</p>
                        <a href="/login" class="btn btn-light btn-sm">
                            <i class="fas fa-sign-in-alt me-1"></i>Login Sekarang
                        </a>
                    </div>
                    
                    <!-- Comments List -->
                    @foreach($article->comments as $comment)
                    <div class="comment-card p-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong style="color: var(--text-primary);">{{ $comment->user->nama }}</strong>
                                <small class="text-muted ms-2">{{ $comment->created_at->format('d M Y H:i') }}</small>
                            </div>
                        </div>
                        <p class="mb-0 mt-2">{{ $comment->isi_komentar }}</p>
                    </div>
                    @endforeach
                    
                    @if($article->comments->count() == 0)
                        <div class="text-center py-4">
                            <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada komentar. Login untuk menjadi yang pertama berkomentar!</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="menu-card p-4">
                    <h5 class="fw-bold mb-3" style="color: var(--text-primary);">Menu Artikel</h5>
                    <div class="d-grid gap-2">
                        <a href="/" class="btn btn-outline-primary" style="border-radius: 12px;">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Artikel
                        </a>
                        <a href="{{ route('public.articles.pdf', $article->id_artikel) }}" class="btn btn-danger" style="border-radius: 12px;" title="Download PDF">
                            <i class="fas fa-file-pdf me-2"></i>Download PDF
                        </a>
                        <div class="login-prompt">
                            <h6><i class="fas fa-user-plus me-2"></i>Bergabung dengan kami!</h6>
                            <p class="mb-3">Daftar untuk menulis artikel sendiri</p>
                            <a href="/register" class="btn btn-light btn-sm">
                                <i class="fas fa-user-plus me-1"></i>Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>