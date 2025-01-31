<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class hasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $roles = explode('||', $roles);
        if (empty($roles)) $roles = ['admin'];

        foreach ($roles as $role) {
            if (auth()->user()->role_slug === $role) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
