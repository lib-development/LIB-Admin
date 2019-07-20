<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()){
            return redirect()->to('/');
        } else {
            return $next($request);
        }
    }
}
