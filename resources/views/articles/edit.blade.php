<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel - E-Mading</title>
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
        
        .form-card { 
            background: var(--card-bg); 
            border: 2px solid var(--border-color);
            border-radius: 15px; 
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
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-card p-4">
                    <h3 class="fw-bold mb-4" style="color: var(--text-primary);"><i class="fas fa-edit me-2"></i>Edit Artikel</h3>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('articles.update', $article->id_artikel) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul', $article->judul) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_kategori }}" {{ old('id_kategori', $article->id_kategori) == $category->id_kategori ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Isi Artikel</label>
                            <textarea name="isi" class="form-control" rows="10" required>{{ old('isi', $article->isi) }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Foto (Opsional)</label>
                            @if($article->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $article->foto) }}" class="img-thumbnail" style="max-height: 200px;" alt="Current image">
                                    <small class="text-muted d-block">Foto saat ini</small>
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Artikel</button>
                            <a href="{{ route('articles.my') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>