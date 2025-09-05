<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && strtolower(Auth::user()->Role) === 'admin') {
            return $next($request);
        }

        abort(403, 'Access denied');
    }
}