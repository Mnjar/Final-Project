<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->role != 'admin')
            {
                return redirect('/get-barang');
            }
        }
        else
        {
            return redirect ('/register');
        }

        return $next($request);
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->role == 'admin') {
    //         return $next($request);
    //     }
        
    //     return redirect('/get-barang')->with('error', 'You are not authorized to access this page.');
    // }
}
