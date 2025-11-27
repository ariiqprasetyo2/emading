<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;
        
        // Debug: Log the attempt
        \Log::info('Login attempt for username: ' . $username);
        
        $user = User::where('username', $username)->first();
        
        if (!$user) {
            \Log::info('User not found: ' . $username);
            return back()->withErrors([
                'username' => 'Username tidak ditemukan.',
            ])->onlyInput('username');
        }
        
        \Log::info('User found: ' . $user->username . ', checking password...');
        
        if (Hash::check($password, $user->password)) {
            \Log::info('Password correct, logging in user: ' . $username);
            Auth::login($user);
            $request->session()->regenerate();
            \Log::info('User logged in successfully, redirecting to dashboard');
            return redirect('/dashboard');
        }
        
        \Log::info('Password incorrect for user: ' . $username);
        return back()->withErrors([
            'username' => 'Password salah.',
        ])->onlyInput('username');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:5',
            'role' => 'required|in:admin,guru,siswa'
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}