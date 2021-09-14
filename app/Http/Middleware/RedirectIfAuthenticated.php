<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }

            if (Auth::guard($guard)->check() && Auth::user()->hasRole('Admin')) {
                return redirect()->route('admin.myHome');
            }elseif (Auth::guard($guard)->check() && Auth::user()->hasRole('user')) {
                return redirect()->route('home');
            }
            if(Auth::guard($guard)->check() && Auth::user()->hasRole('writer')) {
                return redirect()->route('writer.index');
            }
        }

        return $next($request);
    }
}
