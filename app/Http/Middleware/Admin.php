<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class Admin - middleware for admin checking.
 */
class Admin
{
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }

        return redirect(route('admin.auth.login'));
    }
}
