<?php

namespace Subalroy22\LaravelRolePermissions\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permission)
    {
        $user = Auth::user();

        if(!$user || !$user->hasPermissionTo($permission)) {
            return abort(403, 'Unauthorized: missing required permission.');
        }

        return $next($request);
    }
}