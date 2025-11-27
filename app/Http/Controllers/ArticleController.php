<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Category;
use App\Models\Komentar;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::with(['user', 'category', 'comments', 'likes']);
        
        // Jika user adalah murid atau guru, hanya tampilkan artikel yang sudah dipublish
        if (in_array(auth()->user()->role, ['siswa', 'guru'])) {
            $query->where('status', 'publish');
        }
        
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('isi', 'like', '%' . $request->search . '%');
        }
        
        if ($request->category) {
            $query->where('id_kategori', $request->category);
        }
        
        $articles = $query->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Artikel::with(['user', 'category', 'comments.user', 'likes'])->findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_kategori' => $request->id_kategori,
            'id_user' => auth()->user()->id_user,
            'status' => 'draft',
            'tanggal' => now()
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        Artikel::create($data);
        return redirect()->route('articles.my')->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit($id)
    {
        $article = Artikel::where('id_user', auth()->user()->id_user)->findOrFail($id);
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Artikel::where('id_user', auth()->user()->id_user)->findOrFail($id);
        
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_kategori' => $request->id_kategori
        ];
        
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        $article->update($data);
        return redirect()->route('articles.my')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $article = Artikel::findOrFail($id);
        
        // Only owner or admin can delete
        if ($article->id_user != auth()->user()->id_user && auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki izin untuk menghapus artikel ini.');
        }
        
        $article->delete();
        return redirect()->back()->with('success', 'Artikel berhasil dihapus.');
    }

    public function myArticles()
    {
        $articles = Artikel::where('id_user', auth()->user()->id_user)
            ->with(['category', 'comments', 'likes'])
            ->latest()
            ->paginate(10);
        return view('articles.my', compact('articles'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'isi_komentar' => 'required'
        ]);

        $article = Artikel::findOrFail($id);
        
        Komentar::create([
            'isi_komentar' => $request->isi_komentar,
            'id_artikel' => $id,
            'id_user' => auth()->user()->id_user
        ]);

        // Kirim notifikasi ke penulis artikel (jika bukan diri sendiri)
        if ($article->id_user != auth()->user()->id_user) {
            \App\Http\Controllers\NotificationController::createNotification(
                $article->id_user,
                'comment',
                'Komentar Baru',
                auth()->user()->nama . ' berkomentar pada artikel "' . $article->judul . '"',
                $article->id_artikel
            );
        }

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function publish($id)
    {
        $article = Artikel::findOrFail($id);
        
        // Hanya admin dan guru yang bisa publish artikel
        if (in_array(auth()->user()->role, ['admin', 'guru'])) {
            $article->update(['status' => 'publish']);
            
            // Kirim notifikasi ke penulis artikel
            \App\Http\Controllers\NotificationController::createNotification(
                $article->id_user,
                'publish',
                'Artikel Dipublish',
                'Artikel "' . $article->judul . '" telah dipublish oleh ' . auth()->user()->nama,
                $article->id_artikel
            );
            
            return back()->with('success', 'Artikel berhasil dipublish.');
        }
        
        return back()->with('error', 'Hanya guru dan admin yang dapat mempublish artikel.');
    }

    public function unpublish($id)
    {
        $article = Artikel::findOrFail($id);
        
        // Hanya admin dan guru yang bisa unpublish artikel
        if (in_array(auth()->user()->role, ['admin', 'guru'])) {
            $article->update(['status' => 'draft']);
            return back()->with('success', 'Artikel berhasil dijadikan draft.');
        }
        
        return back()->with('error', 'Hanya guru dan admin yang dapat mengubah status artikel.');
    }
}