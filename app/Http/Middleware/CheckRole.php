<?php

namespace Imperium\Http\Middleware;

use Closure;

Class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            // If the user doesn't have permissions, redirect
            return redirect()->back();
        }

        return $next($request);
    }

}