<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->judul }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            line-height: 1.6;
            margin: 30px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #2196F3;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h1 {
            color: #2196F3;
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }
        .header p {
            margin: 5px 0 0 0;
            color: #666;
            font-style: italic;
            font-size: 12px;
        }
        .article-title {
            font-size: 22px;
            font-weight: bold;
            color: #1565C0;
            margin-bottom: 20px;
            text-align: center;
        }
        .article-meta {
            background: #f8f9fa;
            padding: 12px;
            border: 1px solid #dee2e6;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .article-meta strong {
            color: #2196F3;
            font-weight: bold;
        }
        .article-content {
            font-size: 14px;
            line-height: 1.7;
            text-align: justify;
            margin-bottom: 25px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>E-MADING SMK BAKTI NUSANTARA 666</h1>
        <p>"Kreatif, Inovatif, Unggul dan Mandiri!"</p>
    </div>

    <div class="article-title">{{ $article->judul }}</div>

    <div class="article-meta">
        <strong>Penulis:</strong> {{ $article->user->nama }} ({{ $article->user->role == 'siswa' ? 'Murid' : ucfirst($article->user->role) }})<br>
        <strong>Kategori:</strong> {{ $article->category->nama_kategori }}<br>
        <strong>Tanggal:</strong> {{ $article->created_at->format('d F Y, H:i') }} WIB<br>
        <strong>Status:</strong> {{ ucfirst($article->status) }}
    </div>

    <div class="article-content">
        {!! nl2br(e($article->isi)) !!}
    </div>

    <div class="footer">
        <p>Dokumen ini digenerate dari E-Mading SMK Bakti Nusantara 666</p>
        <p>Tanggal unduh: {{ now()->format('d F Y, H:i') }} WIB</p>
    </div>
    <script>
        window.onload = function() {
            setTimeout(() => {
                window.print();
            }, 500);
        };
    </script>
</body>
</html>