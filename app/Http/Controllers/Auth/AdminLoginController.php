<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Menampilkan form login admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Ambil data login
        $credentials = $request->only('email', 'password');

        // Coba login menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    // Fungsi logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // pakai guard('admin') sesuai login
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'Anda telah berhasil logout.');
    }
}
