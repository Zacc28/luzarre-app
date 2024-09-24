<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Menampilkan view login
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial user
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Simpan id user ke dalam session
            $request->session()->put('user_id', Auth::id());

            return redirect()->intended(route('home')); // Redirect ke halaman home jika login berhasil
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Email atau password salah'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }

}
