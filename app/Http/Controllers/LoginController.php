<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
        {
            if (Auth::check()) {
                // mengecek role user yang sudah login untuk diarahkan ke halaman yang disesuaikan
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect('/admin'); 
                } else {
                    return redirect('/'); 
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

    // mengecek apakah ada emailnya
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Email yang Anda masukkan tidak terdaftar.'])->onlyInput('email');
    }

    // jika user ada, coba login
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        if (Auth::user()->role === 'admin') {
            return redirect('/admin');
        }
        return redirect('/');
    }
    
    // email ada tapi passwod salah
    return back()->withErrors(['email' => 'Password yang Anda masukkan salah.'])->onlyInput('email');
}

    public function actionLogout() {
        Auth::logout();
        return redirect('/');
    }
}
