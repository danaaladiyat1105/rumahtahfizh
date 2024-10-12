<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            return redirect('login'); // Arahkan ke halaman login jika tidak terautentikasi
        }
    
        // Cek apakah pengguna adalah admin
        if (Auth::user()->usertype != 'admin') {
            return redirect('dashboard'); // Arahkan ke dashboard jika bukan admin
        }
    
        return $next($request); // Lanjutkan ke permintaan berikutnya
    }
    
}
