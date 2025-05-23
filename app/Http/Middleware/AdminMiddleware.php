<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Verificar que el usuario es administrador
        if (!Auth::user()->hasRole('admin')) {
            Auth::logout();
            return redirect()->route('home')->with('error', 'Acceso denegado. Solo los administradores pueden acceder al sistema.');
        }

        // Verificar que tiene token
        if (empty(Auth::user()->admin_token)) {
            Auth::logout();
            return redirect()->route('home')->with('error', 'Acceso denegado. No tienes un token de administrador válido.');
        }

        return $next($request);
    }
}
