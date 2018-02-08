<?php

namespace App\Http\Middleware;

// use Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->hasRole('siswa')) {
                return redirect(route('indexPendaftaranSiswa'));
            } else if (Auth::user()->hasRole('admin')) {
                return redirect(route('indexJurusanKelasAdmin'));
            } else {
                return redirect(route('logout'));
            }
            // return redirect('/home');
        }

        return $next($request);
    }
}
