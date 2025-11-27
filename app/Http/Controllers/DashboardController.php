<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Redirect admin to admin panel
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        // Redirect guru to guru panel
        if ($user->role === 'guru') {
            return redirect()->route('guru.dashboard');
        }
        
        $stats = [
            'total_users' => User::count(),
            'total_admin' => User::where('role', 'admin')->count(),
            'total_guru' => User::where('role', 'guru')->count(),
            'total_siswa' => User::where('role', 'siswa')->count(),
        ];
        
        return view('dashboard', compact('user', 'stats'));
    }
}