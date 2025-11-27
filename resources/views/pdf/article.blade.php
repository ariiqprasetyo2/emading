<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->judul }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            line-height: 1.6;
            margin: 30px;
            color: #333;
            font-size: 14px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #2196F3;
            padding-bottom: 20px;
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        .header h1 {
            color: #2196F3;
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }
        .header p {
            margin: 8px 0 0 0;
            color: #666;
            font-style: italic;
            font-size: 12px;
        }
        .article-title {
            font-size: 24px;
            font-weight: bold;
            color: #1565C0;
            margin-bottom: 25px;
            text-align: center;
            page-break-inside: avoid;
        }
        .article-meta {
            background: #f8f9fa;
            padding: 15px;
            border: 1px solid #dee2e6;
            margin-bottom: 25px;
            font-size: 13px;
            page-break-inside: avoid;
        }
        .article-meta strong {
            color: #2196F3;
            font-weight: bold;
        }
        .article-content {
            font-size: 14px;
            line-height: 1.8;
            text-align: justify;
            margin-bottom: 30px;
        }
        .article-content p {
            margin-bottom: 12px;
        }
        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 11px;
            color: #666;
            page-break-inside: avoid;
        }
        @media print {
            body { 
                margin: 15px;
                font-size: 12px;
            }
            .header { page-break-inside: avoid; }
            .article-title { page-break-inside: avoid; }
            .article-meta { page-break-inside: avoid; }
        }
        @page {
            margin: 2cm;
            size: A4;
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

    <div class="no-print" style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
        <button onclick="window.print()" class="btn btn-primary" style="padding: 10px 20px; background: #2196F3; color: white; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;">
            <i class="fas fa-print"></i> Print/Save as PDF
        </button>
        <button onclick="window.close()" class="btn btn-secondary" style="padding: 10px 20px; background: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;">
            <i class="fas fa-times"></i> Close
        </button>
    </div>

    <script>
        // Auto-focus for better user experience
        window.onload = function() {
            // Optional: Auto-print when page loads (uncomment if desired)
            // setTimeout(() => window.print(), 1000);
        };
    </script>

    <style>
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</body>
</html>