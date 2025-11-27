<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'komentars';
    protected $primaryKey = 'id_komentar';
    
    protected $fillable = [
        'isi_komentar',
        'id_artikel',
        'id_user'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    
    public function article()
    {
        return $this->belongsTo(Article::class, 'id_artikel', 'id_artikel');
    }
}
