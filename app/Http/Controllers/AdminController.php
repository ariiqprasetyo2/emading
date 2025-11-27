<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    // Dashboard Admin
    public function dashboard()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $stats = [
            'total_users' => User::count(),
            'total_articles' => DB::table('artikels')->count(),
            'pending_articles' => DB::table('artikels')->where('status', 'draft')->count(),
            'total_categories' => DB::table('kategoris')->count(),
            'total_comments' => DB::table('komentars')->count(),
            'users_by_role' => [
                'admin' => User::where('role', 'admin')->count(),
                'guru' => User::where('role', 'guru')->count(),
                'siswa' => User::where('role', 'siswa')->count(),
            ]
        ];
        
        return view('admin.dashboard', compact('stats'));
    }

    // Kelola Kategori
    public function categories()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $categories = DB::table('kategoris')
            ->leftJoin('artikels', 'kategoris.id_kategori', '=', 'artikels.id_kategori')
            ->select('kategoris.*', DB::raw('COUNT(artikels.id_artikel) as articles_count'))
            ->groupBy('kategoris.id_kategori', 'kategoris.nama_kategori', 'kategoris.created_at', 'kategoris.updated_at')
            ->paginate(10);
        return view('admin.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori'
        ]);

        DB::table('kategoris')->insert([
            'nama_kategori' => $request->nama_kategori,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function updateCategory(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris,nama_kategori,' . $id . ',id_kategori'
        ]);

        DB::table('kategoris')->where('id_kategori', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'updated_at' => now()
        ]);
        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function deleteCategory($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        DB::table('kategoris')->where('id_kategori', $id)->delete();
        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil dihapus.');
    }

    // Verifikasi Artikel
    public function articles()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $articles = DB::table('artikels')
            ->join('users', 'artikels.id_user', '=', 'users.id_user')
            ->join('kategoris', 'artikels.id_kategori', '=', 'kategoris.id_kategori')
            ->select('artikels.*', 'users.nama as user_nama', 'users.role as user_role', 'kategoris.nama_kategori')
            ->orderBy('artikels.created_at', 'desc')
            ->paginate(10);
        
        // Convert created_at to Carbon instances
        $articles->getCollection()->transform(function ($article) {
            $article->created_at = \Carbon\Carbon::parse($article->created_at);
            return $article;
        });
        
        return view('admin.articles', compact('articles'));
    }

    public function approveArticle($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        
        $artikel = DB::table('artikels')->where('id_artikel', $id)->first();
        DB::table('artikels')->where('id_artikel', $id)->update(['status' => 'publish']);
        
        \App\Http\Controllers\NotificationController::createNotification(
            $artikel->id_user,
            'publish',
            'Artikel Disetujui',
            'Artikel "' . $artikel->judul . '" telah disetujui dan dipublikasikan oleh admin',
            $artikel->id_artikel
        );
        
        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil disetujui.');
    }

    public function rejectArticle($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        DB::table('artikels')->where('id_artikel', $id)->update(['status' => 'draft']);
        return redirect()->route('admin.articles')->with('success', 'Artikel ditolak dan dikembalikan ke draft.');
    }

    public function deleteArticle($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        DB::table('artikels')->where('id_artikel', $id)->delete();
        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil dihapus.');
    }

    // Kelola User
    public function users()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
            'role' => 'required|in:admin,guru,siswa'
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan.');
    }

    public function updateUser(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $user = User::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id . ',id_user',
            'role' => 'required|in:admin,guru,siswa'
        ]);

        $data = $request->only(['nama', 'username', 'role']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui.');
    }

    public function deleteUser($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $user = User::findOrFail($id);
        if ($user->id_user == auth()->user()->id_user) {
            return redirect()->route('admin.users')->with('error', 'Tidak dapat menghapus akun sendiri.');
        }
        
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }

    // Laporan
    public function reports()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        $data = [
            'users_stats' => [
                'total' => User::count(),
                'admin' => User::where('role', 'admin')->count(),
                'guru' => User::where('role', 'guru')->count(),
                'siswa' => User::where('role', 'siswa')->count(),
            ],
            'articles_stats' => [
                'total' => DB::table('artikels')->count(),
                'published' => DB::table('artikels')->where('status', 'publish')->count(),
                'draft' => DB::table('artikels')->where('status', 'draft')->count(),
                'by_category' => DB::table('kategoris')
                    ->leftJoin('artikels', 'kategoris.id_kategori', '=', 'artikels.id_kategori')
                    ->select('kategoris.nama_kategori', DB::raw('COUNT(artikels.id_artikel) as articles_count'))
                    ->groupBy('kategoris.id_kategori', 'kategoris.nama_kategori')
                    ->get(),
                'recent' => DB::table('artikels')
                    ->join('users', 'artikels.id_user', '=', 'users.id_user')
                    ->join('kategoris', 'artikels.id_kategori', '=', 'kategoris.id_kategori')
                    ->select('artikels.judul', 'artikels.status', 'users.nama as user_nama', 'kategoris.nama_kategori')
                    ->orderBy('artikels.created_at', 'desc')
                    ->take(5)
                    ->get()
            ],
            'activity_stats' => [
                'total_comments' => DB::table('komentars')->count(),
                'articles_this_month' => DB::table('artikels')->whereMonth('created_at', now()->month)->count(),
                'users_this_month' => User::whereMonth('created_at', now()->month)->count(),
            ]
        ];

        return view('admin.reports', compact('data'));
    }
}