<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SecureSession
{
    public function handle(Request $request, Closure $next)
    {
        // Get current IP and User-Agent
        $currentIp = $request->ip();
        $currentAgent = $request->header('User-Agent');
        
        // Get stored IP and User-Agent from session
        $storedIp = Session::get('ip_address');
        $storedAgent = Session::get('user_agent');
        
        if (!$storedIp) {
            Session::put('ip_address', $currentIp);
            Session::put('user_agent', $currentAgent);
        } elseif ($storedIp !== $currentIp || $storedAgent !== $currentAgent) {
            // Invalidate the session if IP or User-Agent doesn't match
            Auth::logout();
            Session::flush();
            return redirect('/login')->withErrors(['Your session has been terminated for security reasons.']);
        }

        return $next($request);
    }
}
