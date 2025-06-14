<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ExhibitorAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'exhibitor')
    {
        if (Auth::guard($guard)->user()) {
            return $next($request);
        }
        return redirect(route('exhibitor.login'));
    }
}
