<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VendorAuthenticate
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
        if (Auth::guard($guard)->user()) {
            return $next($request);
        }
        return redirect(route('vendor.login'));
    }
}
