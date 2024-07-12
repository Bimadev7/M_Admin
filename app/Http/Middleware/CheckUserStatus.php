<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

        public function handle(Request $request, Closure $next, $role)
        {
            // if (!Auth::check() || Auth::user()->role !== $role) {
            //     return redirect('/home'); // Atau rute lain yang diinginkan jika akses ditolak
            // }
    
            return $next($request);
        }
    
}
