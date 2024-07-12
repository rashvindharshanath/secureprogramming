<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RequireEmail2FA
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->email_2fa_enabled) {
            return redirect()->route('verify.email'); // Redirect to email verification page
        }

        return $next($request);
    }
}
