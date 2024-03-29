<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Control
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('id') && session()->get('users_email')) {

            return $next($request);
        } else {
            abort("403", "Vous n'êtes pas autorisez à voir cette page");

        }
    }
}
