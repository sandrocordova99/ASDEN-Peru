<?php

namespace App\Http\Middleware;

use App\Models\UserASDEN;
use Carbon\Carbon;
use Closure;


class CheckInvitationExpiration
{
    public function handle($request, Closure $next)
    {
        $user = UserASDEN::where('invitation_token', $request->token)
            ->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Enlace inválido.');
        }

        if (
            $user->invitation_token === $request->token
            && $user->password_reset_expires_at !== null
            && Carbon::now()->gt($user->password_reset_expires_at)
        ) {
            return redirect()->route('login')->with('error', 'El enlace de recuperación ha expirado.');
        }

        if (
            $user->invitation_token === $request->token
            && $user->invitation_expires_at !== null
            && Carbon::now()->gt($user->invitation_expires_at)
            && $user->password_reset_expires_at === null
        ) {
            return redirect()->route('login')->with('error', 'El enlace de invitación ha expirado.');
        }

        return $next($request);
    }
}
