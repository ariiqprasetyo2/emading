<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id_notifikasi';
    
    protected $fillable = [
        'id_user',
        'type',
        'title',
        'message',
        'id_artikel',
        'is_read'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function article()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id_artikel');
    }
}