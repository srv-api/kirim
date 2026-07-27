<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        // Jika sudah login, langsung ke dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('login'); // pastikan file login.blade.php ada di resources/views
    }

    // Proses login
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // keamanan
            return redirect()->intended('/dashboard'); // diarahkan ke dashboard
        }

        // Jika gagal login
        return back()->with('error', 'Email atau password salah');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
