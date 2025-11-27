<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak. Hanya guru yang dapat mengakses halaman ini.');
        }
        
        $stats = [
            'my_articles' => DB::table('artikels')->where('id_user', auth()->user()->id_user)->count(),
            'pending_articles' => DB::table('artikels')->where('status', 'draft')->where('id_user', '!=', auth()->user()->id_user)->count(),
            'total_comments' => DB::table('komentars')->whereIn('id_artikel', 
                DB::table('artikels')->where('id_user', auth()->user()->id_user)->pluck('id_artikel')
            )->count(),
            'published_articles' => DB::table('artikels')->where('id_user', auth()->user()->id_user)->where('status', 'publish')->count(),
        ];
        
        return view('guru.dashboard', compact('stats'));
    }

    public function myArticles()
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak. Hanya guru yang dapat mengakses halaman ini.');
        }
        
        $articles = DB::table('artikels')
            ->join('kategoris', 'artikels.id_kategori', '=', 'kategoris.id_kategori')
            ->select('artikels.*', 'kategoris.nama_kategori')
            ->where('artikels.id_user', auth()->user()->id_user)
            ->orderBy('artikels.created_at', 'desc')
            ->paginate(10);
            
        $articles->getCollection()->transform(function ($article) {
            $article->created_at = \Carbon\Carbon::parse($article->created_at);
            return $article;
        });
        
        return view('guru.my-articles', compact('articles'));
    }

    public function studentArticles()
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak. Hanya guru yang dapat mengakses halaman ini.');
        }
        
        $articles = DB::table('artikels')
            ->join('users', 'artikels.id_user', '=', 'users.id_user')
            ->join('kategoris', 'artikels.id_kategori', '=', 'kategoris.id_kategori')
            ->select('artikels.*', 'users.nama as user_nama', 'kategoris.nama_kategori')
            ->where('users.role', 'siswa')
            ->orderBy('artikels.created_at', 'desc')
            ->paginate(10);
            
        $articles->getCollection()->transform(function ($article) {
            $article->created_at = \Carbon\Carbon::parse($article->created_at);
            return $article;
        });
        
        return view('guru.student-articles', compact('articles'));
    }

    public function approveArticle($id)
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak. Hanya guru yang dapat mengakses halaman ini.');
        }
        
        $artikel = DB::table('artikels')->where('id_artikel', $id)->first();
        DB::table('artikels')->where('id_artikel', $id)->update(['status' => 'publish']);
        
        \App\Http\Controllers\NotificationController::createNotification(
            $artikel->id_user,
            'publish',
            'Artikel Disetujui',
            'Artikel "' . $artikel->judul . '" telah disetujui dan dipublikasikan oleh guru',
            $artikel->id_artikel
        );
        
        return redirect()->route('guru.student-articles')->with('success', 'Artikel berhasil disetujui.');
    }

    public function rejectArticle($id)
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak. Hanya guru yang dapat mengakses halaman ini.');
        }
        
        DB::table('artikels')->where('id_artikel', $id)->update(['status' => 'draft']);
        return redirect()->route('guru.student-articles')->with('success', 'Artikel ditolak dan dikembalikan ke draft.');
    }

    public function comments()
    {
        if (auth()->user()->role !== 'guru') {
            abort(403, 'Akses ditolak. Hanya guru yang dapat mengakses halaman ini.');
        }
        
        $comments = DB::table('komentars')
            ->join('artikels', 'komentars.id_artikel', '=', 'artikels.id_artikel')
            ->join('users', 'komentars.id_user', '=', 'users.id_user')
            ->select('komentars.id_komentar', 'komentars.isi_komentar as isi', 'komentars.created_at', 'komentars.id_artikel', 'artikels.judul', 'users.nama as user_nama')
            ->where('artikels.id_user', auth()->user()->id_user)
            ->orderBy('komentars.created_at', 'desc')
            ->paginate(10);
            
        $comments->getCollection()->transform(function ($comment) {
            $comment->created_at = \Carbon\Carbon::parse($comment->created_at);
            return $comment;
        });
        
        return view('guru.comments', compact('comments'));
    }
}