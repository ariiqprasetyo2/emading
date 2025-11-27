<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    
    protected $fillable = [
        'nama_kategori'
    ];
    
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_kategori', 'id_kategori');
    }
}
