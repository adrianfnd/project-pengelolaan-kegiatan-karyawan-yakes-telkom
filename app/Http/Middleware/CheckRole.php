<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $role = Role::findOrFail(Auth::user()->roles);

        $userRoles = $role->name;

        if (in_array($userRoles, $roles)) {
            return $next($request);
        }

        return abort(403, 'Unauthorized');
    }
}
