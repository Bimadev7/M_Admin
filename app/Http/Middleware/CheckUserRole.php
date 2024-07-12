<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // if (!Auth::check() || Auth::user()->role !== 'user') {
        //     return redirect('/home'); // Or any other route you want to redirect to if access is denied
        // }

        return $next($request);
    }
}
