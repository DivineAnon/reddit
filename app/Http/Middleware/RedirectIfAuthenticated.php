<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
//        if (Auth::user()->role == "admin") {
//            return redirect()->route('admin');
//        } elseif (Auth::user()->role == "super_admin") {
//            return redirect()->route('super_admin');
//        } elseif (Auth::user()->role == "user") {
//            return back();
//        }

        return $next($request);
    }
}
