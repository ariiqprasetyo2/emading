<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with(['user', 'kategori', 'likes'])
                          ->where('status', 'publish')
                          ->orderBy('tanggal', 'desc')
                          ->get();
        return view('artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('artikel.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        $data['id_user'] = Auth::user()->id_user;
        $data['tanggal'] = now();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('artikel', 'public');
        }

        Artikel::create($data);
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dibuat');
    }

    public function show($id)
    {
        $artikel = Artikel::with(['user', 'kategori', 'likes'])->findOrFail($id);
        return view('artikel.show', compact('artikel'));
    }
}