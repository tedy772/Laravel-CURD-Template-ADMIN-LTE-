<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class MyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // cek kondisi user apa sudah terauntikasi atau belum
        if (Auth::guard($guard)->check()) {
            return redirect('/profil');
        }
        // jika belum terauntikasi, redirect ke halaman login
        return redirect('/login');
        
    }
}
