<?php

namespace App\Http\Middleware;

use Closure;

class AuthBackend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::guard('backend')->check() === FALSE) {
            return redirect()->route('backend.login_form');
        }

        return $next($request);
    }
}
