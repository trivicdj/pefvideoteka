<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->isAdmin()) {
            abort(403);
        }

        return $next($request);
    }
}
