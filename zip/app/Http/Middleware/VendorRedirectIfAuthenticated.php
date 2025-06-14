<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VendorRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'vendor')
    {
        if (Auth::guard($guard)->check()) {
            return redirect(Route('vendor.dashboard'));
        }

        return $next($request);
    }
}
