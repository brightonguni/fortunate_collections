<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $permission_name
     * @return mixed
     */
    public function handle($request, Closure $next, $permission_name)
    {

        if (auth()->user()->role->name == 'Customer') {
            return redirect('');
        }

        if (!Gate::allows('roleHasPermission', $permission_name)) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}