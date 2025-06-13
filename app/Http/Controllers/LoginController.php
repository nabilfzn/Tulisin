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


    public function actionLogin(Request $request) {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::Attempt($data)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/home');
            }
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionLogout() {
        Auth::logout();
        return redirect('/');
    }
}
