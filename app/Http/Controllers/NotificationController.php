<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('id_user', auth()->user()->id_user)
            ->with('article')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::where('id_notifikasi', $id)
            ->where('id_user', auth()->user()->id_user)
            ->first();
            
        if ($notification) {
            $notification->update(['is_read' => true]);
        }
        
        return back();
    }

    public function markAllAsRead()
    {
        Notification::where('id_user', auth()->user()->id_user)
            ->where('is_read', false)
            ->update(['is_read' => true]);
            
        return back()->with('success', 'Semua notifikasi telah dibaca');
    }

    public static function createNotification($userId, $type, $title, $message, $articleId = null)
    {
        Notification::create([
            'id_user' => $userId,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'id_artikel' => $articleId
        ]);
    }
}