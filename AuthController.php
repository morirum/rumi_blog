<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Giriş formunu göster
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Giriş işlemini gerçekleştir
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Giriş başarılı
            return redirect()->intended('/');
        }

        // Giriş başarısız
        return redirect()->back()->withErrors(['email' => 'Giriş bilgileri hatalı.']);
    }

    // Çıkış işlemini gerçekleştir
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
