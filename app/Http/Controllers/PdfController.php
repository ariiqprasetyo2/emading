<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function exportArticle($id)
    {
        $article = Artikel::with(['user', 'category'])->findOrFail($id);
        
        $html = view('pdf.download', compact('article'))->render();
        $filename = 'artikel-' . str_replace([' ', '/', '\\', '?', '*', ':', '|', '<', '>'], '-', $article->judul) . '.html';
        
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}