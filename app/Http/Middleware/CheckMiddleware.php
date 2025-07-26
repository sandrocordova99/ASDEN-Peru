<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            switch ($user->role) {  
                case 'admin':
                    return redirect('homeDashboard');
                case 'user':
                    return redirect('homepage');
                default:
                    return redirect('collaborators');
            }
        }

        return $next($request);
}
}