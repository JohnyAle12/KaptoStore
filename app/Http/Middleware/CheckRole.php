<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $roles = explode('|', $roles);

        if (! $request->user()->autorizeRoles($roles)) {
            return redirect()->route('home')->with('info', 'no estas autorizado para realizar esta acción.');
        }

        return $next($request);
    }
}
