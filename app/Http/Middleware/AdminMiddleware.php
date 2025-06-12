<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // memastikan user sudah login
        if(!Auth::check()){
            return redirect('/'); // jika belum login diarahkan ke route login
        }

        // $userRole = Auth::user()->role;
        // dd('User is logged in. Role: ' . $userRole);

        // memastikan user yang login adalah admin
        if(Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
    
        }
        return $next($request);
    }
}
