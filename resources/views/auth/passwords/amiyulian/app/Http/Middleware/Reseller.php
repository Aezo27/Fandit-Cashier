<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Reseller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'reseller') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/login');
        }
    }
}
