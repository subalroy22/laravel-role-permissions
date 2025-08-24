<?php

namespace Subalroy22\LaravelRolePermissions\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();

        if(!$user || !$user->hasRole($role)) {
            return abort(403, 'Unauthorized: missing required role');
        }

        return $next($request);
    }
}