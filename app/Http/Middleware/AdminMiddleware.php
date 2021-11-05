<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class AdminMiddleware
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
        if(JWTAuth::user()->usertype == 'admin')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('login');
        }
        //return $next($request);
    }
}
