<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if( Auth::user() && Auth::user()->roles === 1) {
            return $next($request);
        }
        // else if ( Auth::user() && Auth::user()->roles == 'ADMIN' ) {
        //     return redirect('/');
        // }
        return redirect('/');

    }
}