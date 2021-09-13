<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole('Admin')) {
            $user = Auth::user();
            $user->givePermissionTo('role-edit');
            $user->givePermissionTo('role-delete');
            $user->givePermissionTo('role-create');
            return $next($request);
        } else {
            return redirect()->route('login');
        }
        
    }
}
