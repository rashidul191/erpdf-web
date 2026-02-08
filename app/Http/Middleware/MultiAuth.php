<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MultiAuth
{
    public function handle($request, Closure $next)
    {
        // Admin guard authenticated?
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Normal user authenticated?
        if (Auth::guard('web')->check()) {
            return $next($request);
        }

        // No one logged in → Redirect to login
        return redirect()->route('login');
    }
}
