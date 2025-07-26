<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->auth_user; 
        
        if (!$user || !in_array($user->role, $roles)) {
            return response()->json(['message' => 'Acceso no autorizado'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
