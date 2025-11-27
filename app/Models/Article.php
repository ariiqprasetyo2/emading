<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'artikels';
    protected $primaryKey = 'id_artikel';
    
    protected $fillable = [
        'judul',
        'isi',
        'foto',
        'id_user',
        'id_kategori',
        'status',
        'tanggal'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategori');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_artikel', 'id_artikel');
    }
}
