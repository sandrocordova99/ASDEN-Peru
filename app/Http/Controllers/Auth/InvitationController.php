<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserASDEN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvitationController extends Controller
{
    public function showPasswordSetup($token)
    {
        $user = UserASDEN::where('invitation_token', $token)->firstOrFail();
        return view('set-password', compact('token'));
    }

    public function processPasswordSetup(Request $request, $token)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|max:30|confirmed',
            'password_confirmation' => 'required|string'
        ], [
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no puede tener más de 30 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password_confirmation.required' => 'La confirmación de contraseña es obligatoria.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error al ingresar la contraseña.',
                'status' => 400,
                'error' => $validator->errors()
            ], 400);
        }

        $user = UserASDEN::where('invitation_token', $token)->firstOrFail();

        $user->update([
            'password' => bcrypt($request->password),
            'invitation_token' => null, // Invalidar token
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Contraseña establecida. ¡Ya puedes iniciar sesión!',
        ]);
    }
}
