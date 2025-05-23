<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRegisterMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('home')->with('error', 'Solo los administradores pueden registrar nuevos usuarios.');
        }

        return $next($request);
    }
}
