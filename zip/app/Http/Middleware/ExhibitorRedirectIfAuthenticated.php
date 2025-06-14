<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ExhibitorRedirectIfAuthenticated
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
        if (Auth::guard($guard)->check()) {
            return redirect(Route('exhibitor.dashboard'));
        }

        return $next($request);
    }
}
