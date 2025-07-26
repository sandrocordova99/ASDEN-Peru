<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\UserASDEN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password'); // Vista para ingresar el email
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:user_a_s_d_e_n_s,email']);

        $user = UserASDEN::where('email', $request->email)->first();
        $token = Str::random(32);
        $user->update([
            'invitation_token' => $token,
            'password_reset_expires_at' => now()->addHours(24),
        ]);

        Mail::to($user->email)->send(new PasswordResetMail($user, $token));
        return redirect()->route('login')->with('success', '¡Enlace de recuperación enviado!');
    }

    public function showResetForm($token)
    {
        // Verifica que el token exista sin cargar el modelo completo
        if (!UserASDEN::where('invitation_token', $token)->exists()) {
            abort(404);
        }

        return view('set-password', [ // Reutiliza tu vista existente
            'token' => $token,
            'isReset' => true, // Variable para distinguir entre invitación y recuperación
        ]);
    }

    public function handleReset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = UserASDEN::where('password_reset_token', $request->token)->firstOrFail();

        $user->update([
            'password' => Hash::make($request->password),
            'invitation_token' => null,
            'password_reset_expires_at' => null,
        ]);

        return redirect()->route('login')->with('success', '¡Contraseña actualizada!');
    }
}
