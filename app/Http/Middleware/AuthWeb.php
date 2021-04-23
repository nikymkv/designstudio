<?php

namespace App\Http\Middleware;

use Closure;

class AuthWeb
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
        if (\Auth::guard('web')->check() === FALSE) {
            return redirect()->route('web.login');
        }

        return $next($request);
    }
}
