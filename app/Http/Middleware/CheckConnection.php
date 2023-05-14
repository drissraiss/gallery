<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('home')) {
            if (session()->has('connected')) {
                return $next($request);
            } else {
                return redirect()->route('login');
            }
        }
        if ($request->routeIs("login") or $request->routeIs("signup")) {
            if (session()->has("connected")) {
                return redirect()->route("home");
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
