<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $class)
    {
        if (Auth::user()->class < $class) {
            return redirect()->route('dashboard')->withErrors(["message" => "Unauthorized."]);
        }

        return $next($request);
    }
}
