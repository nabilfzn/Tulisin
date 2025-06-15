<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
        {
            if (Auth::check()) {
                // Jika sudah login, cek role user untuk mengarahkan ke halaman yang benar
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect('/admin'); // Arahkan ke admin.blade.php
                } else {
                    return redirect('/'); // Arahkan ke halaman utama user biasa (misal dashboard)
                }
            } else {
                return view('login');
            }
        }


public function actionLogin(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Cek dulu apakah user dengan email tersebut ada
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Email yang Anda masukkan tidak terdaftar.'])->onlyInput('email');
    }

    // Jika user ada, coba login
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        if (Auth::user()->role === 'admin') {
            return redirect('/admin');
        }
        return redirect('/');
    }
    
    // Jika user ada tapi login gagal, berarti passwordnya yang salah
    return back()->withErrors(['email' => 'Password yang Anda masukkan salah.'])->onlyInput('email');
}

    public function actionLogout() {
        Auth::logout();
        return redirect('/');
    }
}
