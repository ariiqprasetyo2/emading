<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User - Admin</title>
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
        
        .form-control {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
        }
        
        .form-control:focus {
            background: var(--card-bg);
            border-color: #667eea;
            color: var(--text-primary);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a5b95 100%);
            transform: translateY(-2px);
        }
        
        .alert-success {
            background: rgba(67, 233, 123, 0.1);
            border: 1px solid rgba(67, 233, 123, 0.3);
            color: #43e97b;
        }
        
        .alert-danger {
            background: rgba(250, 112, 154, 0.1);
            border: 1px solid rgba(250, 112, 154, 0.3);
            color: #fa709a;
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
                <a href="{{ route('admin.users') }}" class="nav-link active">
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
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="admin-card p-4">
                    <h4 class="fw-bold mb-4 text-white"><i class="fas fa-users-cog text-info me-2"></i>Daftar User</h4>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Bergabung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $index }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'guru' ? 'success' : 'primary') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="editUser({{ $user->id_user }}, '{{ $user->nama }}', '{{ $user->username }}', '{{ $user->role }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @if($user->id_user != auth()->user()->id_user)
                                        <form method="POST" action="{{ route('admin.users.delete', $user->id_user) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $users->links() }}
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="admin-card p-4">
                    <h5 class="fw-bold mb-4 text-white"><i class="fas fa-user-plus text-success me-2"></i><span id="formTitle">Tambah User</span></h5>
                    
                    <form method="POST" action="{{ route('admin.users.store') }}" id="userForm">
                        @csrf
                        <input type="hidden" name="_method" value="POST" id="formMethod">
                        <input type="hidden" name="user_id" id="userId">
                        
                        <div class="mb-3">
                            <label class="form-label text-white">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="namaUser" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-white">Username</label>
                            <input type="text" name="username" class="form-control" id="usernameUser" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-white">Password</label>
                            <input type="password" name="password" class="form-control" id="passwordUser">
                            <small class="text-muted" id="passwordHelp">Minimal 5 karakter</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-white">Role</label>
                            <select name="role" class="form-control" id="roleUser" required>
                                <option value="">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="resetForm()" id="cancelBtn" style="display: none;">
                                <i class="fas fa-times"></i> Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editUser(id, nama, username, role) {
            document.getElementById('userForm').action = '/admin/users/' + id;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('userId').value = id;
            document.getElementById('namaUser').value = nama;
            document.getElementById('usernameUser').value = username;
            document.getElementById('roleUser').value = role;
            document.getElementById('passwordUser').required = false;
            document.getElementById('passwordHelp').textContent = 'Kosongkan jika tidak ingin mengubah password';
            document.getElementById('formTitle').textContent = 'Edit User';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save"></i> Update';
            document.getElementById('cancelBtn').style.display = 'block';
        }

        function resetForm() {
            document.getElementById('userForm').action = '{{ route("admin.users.store") }}';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('userId').value = '';
            document.getElementById('namaUser').value = '';
            document.getElementById('usernameUser').value = '';
            document.getElementById('roleUser').value = '';
            document.getElementById('passwordUser').value = '';
            document.getElementById('passwordUser').required = true;
            document.getElementById('passwordHelp').textContent = 'Minimal 5 karakter';
            document.getElementById('formTitle').textContent = 'Tambah User';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save"></i> Simpan';
            document.getElementById('cancelBtn').style.display = 'none';
        }
    </script>
</body>
</html>