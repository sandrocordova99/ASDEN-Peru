<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Log;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        try {
            if (!$token = JWTAuth::getToken()) {
                throw new JWTException('Token no proporcionado');
            }

            if (!$user = JWTAuth::authenticate($token)) {
                throw new JWTException('Usuario no encontrado');
            }

            if (!$user || !$user->id) {
                throw new JWTException('ID de usuario no disponible');
            }

            if (!empty($roles) && !in_array($user->role, $roles)) {
                return response()->json([
                    'message' => 'No tienes permisos para acceder a este recurso'
                ], 403);
            }

            $request->merge(['user_id' => $user->id]);

            return $next($request);

        } catch (TokenExpiredException $e) {
            return response()->json([
                'message' => 'Token expirado',
                'error' => $e->getMessage()
            ], 401);

        } catch (TokenInvalidException $e) {
            return response()->json([
                'message' => 'Token inválido',
                'error' => $e->getMessage()
            ], 401);

        } catch (JWTException $e) {
            return response()->json([
                'message' => 'Error en el token',
                'error' => $e->getMessage()
            ], 401);

        } catch (\Exception $e) {
            Log::error('Error en JWT Middleware:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'message' => 'Error del servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
