<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                @if(auth()->user()->role == 'guru')
                    <h4 class="mb-2"><i class="fas fa-chalkboard-teacher me-2"></i>Panel Guru</h4>
                @else
                    <h4 class="mb-2"><i class="fas fa-graduation-cap me-2"></i>Panel Murid</h4>
                @endif
                <small style="color: var(--text-secondary);">E-Mading System</small>
            </div>
        </div>
        
        <div class="nav-menu">
            <div class="nav-item">
                @if(auth()->user()->role == 'guru')
                    <a href="{{ route('guru.dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                @else
                    <a href="/dashboard" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                @endif
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
            @if(auth()->user()->role == 'guru')
                <div class="nav-item">
                    <a href="{{ route('guru.student-articles') }}" class="nav-link">
                        <i class="fas fa-check-circle"></i>Artikel Murid
                    </a>
                </div>
            @endif
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
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-circle fa-2x me-2" style="color: var(--text-primary);"></i>
                        <div>
                            <div class="fw-bold" style="color: var(--text-primary);">{{ auth()->user()->nama }}</div>
                            <div class="d-flex align-items-center">
                                <small style="color: var(--text-secondary);">{{ auth()->user()->role == 'siswa' ? 'Murid' : ucfirst(auth()->user()->role) }}</small>
                                <a href="{{ route('notifications.index') }}" class="text-decoration-none ms-2 position-relative" style="color: var(--text-primary); font-size: 16px;" title="Notifikasi">
                                    <i class="fas fa-bell"></i>
                                    @php
                                        $unreadCount = \App\Models\Notification::where('id_user', auth()->user()->id_user)->where('is_read', false)->count();
                                    @endphp
                                    @if($unreadCount > 0)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 8px; padding: 2px 4px;">{{ $unreadCount }}</span>
                                    @endif
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
        
        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif
        
        <div class="row">
            <div class="col-md-8">
                <div class="article-card p-4 mb-4">
                    <h2 class="fw-bold mb-3">{{ $article->judul }}</h2>
                    <div class="mb-3">
                        <small class="text-muted">
                            <i class="fas fa-user"></i> {{ $article->user->nama }} ({{ $article->user->role == 'siswa' ? 'Murid' : ucfirst($article->user->role) }}) | 
                            <i class="fas fa-tag"></i> {{ $article->category->nama_kategori }} | 
                            <i class="fas fa-calendar"></i> {{ $article->created_at->format('d M Y H:i') }} |
                            <span class="badge bg-{{ $article->status == 'publish' ? 'success' : 'warning' }}">{{ ucfirst($article->status) }}</span>
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
                        @if(auth()->check())
                            <button class="btn btn-sm like-btn" 
                                    data-article-id="{{ $article->id_artikel }}" 
                                    style="background-color: {{ $article->isLikedBy(auth()->user()->id_user) ? '#dc3545' : '#6c757d' }}; border-color: {{ $article->isLikedBy(auth()->user()->id_user) ? '#dc3545' : '#6c757d' }}; color: white;" 
                                    title="{{ $article->isLikedBy(auth()->user()->id_user) ? 'Unlike' : 'Like' }}">
                                <i class="fas fa-heart"></i>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="article-card p-4">
                    <h5 class="fw-bold mb-3"><i class="fas fa-comments"></i> Komentar ({{ $article->comments->count() }})</h5>
                    
                    <!-- Add Comment Form -->
                    @auth
                    <form method="POST" action="{{ route('articles.comment', $article->id_artikel) }}" class="mb-4">
                        @csrf
                        <div class="mb-3">
                            <textarea name="isi_komentar" class="form-control" rows="3" placeholder="Tulis komentar Anda..." required style="border: 2px solid var(--border-color); border-radius: 12px;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-1"></i> Kirim Komentar</button>
                    </form>
                    @endauth
                    
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
                            <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="menu-card p-4">
                    <h5 class="fw-bold mb-3" style="color: var(--text-primary);">Menu Artikel</h5>
                    <div class="d-grid gap-2">
                        <a href="{{ route('articles.index') }}" class="btn btn-outline-primary" style="border-radius: 12px;">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Artikel
                        </a>
                        @if(auth()->check() && ($article->id_user == auth()->user()->id_user || in_array(auth()->user()->role, ['admin', 'guru'])))
                            @if($article->status == 'draft')
                                <form method="POST" action="{{ route('articles.publish', $article->id_artikel) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success w-100" style="border-radius: 12px;" title="Publish Artikel">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('articles.unpublish', $article->id_artikel) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary w-100" style="border-radius: 12px;" title="Jadikan Draft">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </form>
                            @endif
                        @endif
                        @if(auth()->check() && $article->id_user == auth()->user()->id_user)
                            <a href="{{ route('articles.edit', $article->id_artikel) }}" class="btn btn-warning" style="border-radius: 12px;" title="Edit Artikel">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endif
                        <a href="{{ route('articles.create') }}" class="btn btn-success" style="border-radius: 12px;" title="Buat Artikel Baru">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a href="{{ route('articles.pdf', $article->id_artikel) }}" class="btn btn-danger" style="border-radius: 12px;" title="Download PDF">
                            <i class="fas fa-file-pdf me-2"></i>Download PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.like-btn').forEach(button => {
        button.addEventListener('click', function() {
            const articleId = this.dataset.articleId;
            
            fetch(`/articles/${articleId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                const likesCountElement = document.querySelector('.fa-heart.text-danger').parentElement;
                likesCountElement.innerHTML = `<i class="fas fa-heart text-danger"></i> ${data.likes_count} Like`;
                
                if (data.liked) {
                    this.style.backgroundColor = '#dc3545';
                    this.style.borderColor = '#dc3545';
                    this.title = 'Unlike';
                } else {
                    this.style.backgroundColor = '#6c757d';
                    this.style.borderColor = '#6c757d';
                    this.title = 'Like';
                }
            });
        });
    });
});
</script>
</body>
</html>