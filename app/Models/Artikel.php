<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
    protected $primaryKey = 'id_artikel';
    
    protected $fillable = [
        'judul',
        'isi', 
        'tanggal',
        'id_user',
        'id_kategori',
        'foto',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategori');
    }

    public function comments()
    {
        return $this->hasMany(Komentar::class, 'id_artikel', 'id_artikel');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'id_artikel', 'id_artikel');
    }

    public function isLikedBy($userId)
    {
        return $this->likes()->where('id_user', $userId)->exists();
    }
}