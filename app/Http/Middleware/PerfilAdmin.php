<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PerfilAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $is_admin)
    {
        if (Auth::user() == null || Auth::user()->is_admin<>$is_admin) {

            return redirect()->guest('auth/login');

        }

        return $next($request);
    }
}
