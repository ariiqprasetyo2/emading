<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - E-Mading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2196F3 0%, #1565C0 100%);
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
        
        .notification-card {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            margin-bottom: 15px;
            box-shadow: 0 8px 25px rgba(33, 150, 243, 0.1);
            transition: all 0.3s ease;
        }
        
        .notification-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(33, 150, 243, 0.15);
        }
        
        .notification-unread {
            border-left: 4px solid #2196F3;
            background: rgba(33, 150, 243, 0.05);
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
                @if(auth()->user()->role == 'admin')
                    <h4 class="mb-2"><i class="fas fa-shield-alt me-2"></i>Panel Admin</h4>
                @elseif(auth()->user()->role == 'guru')
                    <h4 class="mb-2"><i class="fas fa-chalkboard-teacher me-2"></i>Panel Guru</h4>
                @else
                    <h4 class="mb-2"><i class="fas fa-graduation-cap me-2"></i>Panel Murid</h4>
                @endif
                <small style="color: var(--text-secondary);">E-Mading System</small>
            </div>
        </div>
        
        <div class="nav-menu">
            <div class="nav-item">
                @if(auth()->user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                @elseif(auth()->user()->role == 'guru')
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
            @if(auth()->user()->role == 'admin')
                <div class="nav-item">
                    <a href="{{ route('admin.categories') }}" class="nav-link">
                        <i class="fas fa-tags"></i>Kelola Kategori
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.articles') }}" class="nav-link">
                        <i class="fas fa-check-circle"></i>Verifikasi Artikel
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.users') }}" class="nav-link">
                        <i class="fas fa-users"></i>Kelola User
                    </a>
                </div>
            @elseif(auth()->user()->role == 'guru')
                <div class="nav-item">
                    <a href="{{ route('guru.student-articles') }}" class="nav-link">
                        <i class="fas fa-check-circle"></i>Artikel Murid
                    </a>
                </div>
            @endif
            @if(auth()->user()->role == 'admin')
                <div class="nav-item">
                    <a href="{{ route('notifications.index') }}" class="nav-link active">
                        <i class="fas fa-bell"></i>Notifikasi
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

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold" style="color: var(--text-primary);"><i class="fas fa-bell me-2"></i>Notifikasi</h3>
                    <a href="{{ route('notifications.mark-all-read') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-check-double me-1"></i>Tandai Semua Dibaca
                    </a>
                </div>

                @foreach($notifications as $notification)
                <div class="notification-card p-4 {{ !$notification->is_read ? 'notification-unread' : '' }}">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                @if($notification->type == 'publish')
                                    <i class="fas fa-eye text-success me-2"></i>
                                @elseif($notification->type == 'like')
                                    <i class="fas fa-heart text-danger me-2"></i>
                                @elseif($notification->type == 'comment')
                                    <i class="fas fa-comment text-info me-2"></i>
                                @endif
                                <h6 class="mb-0 fw-bold" style="color: var(--text-primary);">{{ $notification->title }}</h6>
                                @if(!$notification->is_read)
                                    <span class="badge bg-primary ms-2">Baru</span>
                                @endif
                            </div>
                            <p class="mb-2" style="color: var(--text-secondary);">{{ $notification->message }}</p>
                            <small class="text-muted">{{ $notification->created_at->format('d M Y, H:i') }}</small>
                        </div>
                        <div class="d-flex gap-2">
                            @if($notification->id_artikel)
                                <a href="{{ route('articles.show', $notification->id_artikel) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endif
                            @if(!$notification->is_read)
                                <a href="{{ route('notifications.mark-read', $notification->id_notifikasi) }}" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-check"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

                @if($notifications->count() == 0)
                    <div class="notification-card p-4 text-center">
                        <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                        <h5>Tidak Ada Notifikasi</h5>
                        <p class="text-muted">Notifikasi akan muncul di sini ketika ada aktivitas pada artikel Anda.</p>
                    </div>
                @endif

                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</body>
</html>