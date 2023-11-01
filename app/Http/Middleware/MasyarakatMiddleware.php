<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if( Auth::user() && Auth::user()->roles === 1) {
            return $next($request);
        }
        return redirect('/');

    }
}