<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            if (Auth::user()->hasRole('siswa')) {
                return redirect(route('indexPendaftaranSiswa'));
            } else if (Auth::user()->hasRole('admin')) {
                return redirect(route('indexJurusanKelasAdmin'));
            } else {
                return redirect(route('logout'));
            }
        }
        return $next($request);
    }
}
