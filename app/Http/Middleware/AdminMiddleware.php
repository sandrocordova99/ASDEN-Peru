<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function handle($request, Closure $next)
{

  

    if ($request->user() && $request->user()->role === 'admin') {
        return $next($request);
    }
    
    // Si no es admin, redirige
    return redirect('/ourWork')->with('error', 'Acceso denegado. No tienes permisos de administrador.');
}
}
