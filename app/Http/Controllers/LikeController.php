<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Artikel;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $userId = auth()->user()->id_user;
        
        $existingLike = Like::where('id_artikel', $id)
                           ->where('id_user', $userId)
                           ->first();
        
        if ($existingLike) {
            $existingLike->delete();
            $liked = false;
        } else {
            Like::create([
                'id_artikel' => $id,
                'id_user' => $userId
            ]);
            $liked = true;
            
            // Kirim notifikasi ke penulis artikel (jika bukan diri sendiri)
            if ($artikel->id_user != $userId) {
                \App\Http\Controllers\NotificationController::createNotification(
                    $artikel->id_user,
                    'like',
                    'Like Baru',
                    auth()->user()->nama . ' menyukai artikel "' . $artikel->judul . '"',
                    $artikel->id_artikel
                );
            }
        }
        
        $likesCount = $artikel->likes()->count();
        
        return response()->json([
            'liked' => $liked,
            'likes_count' => $likesCount
        ]);
    }
}