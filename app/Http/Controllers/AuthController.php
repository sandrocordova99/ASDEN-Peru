<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{

    
    public function login(Request $request)
    {
        /** @var \App\Models\MyUserModel $user **/
        try {
            // Validación de campos
            $validatedData = $request->validate([
                'email' => 'required|email|max:50',
                'password' => 'required|min:8|max:30'
            ], [
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.email' => 'Ingresa un correo electrónico válido.',
                'email.max' => 'El correo no debe exceder 60 caracteres.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
                'password.max' => 'La contraseña no debe exceder 30 caracteres.'
            ]);

            // Verificar credenciales
            if (!Auth::attempt($validatedData)) {
                // $userExists = UserASDEN::where('email', $validatedData['email'])->exists();
                return response()->json([
                    'message' => 'Credenciales incorrectas',
                    'error' => [
                        'email' => '',
                        'password' => 'El correo o la contraseña son incorrectos.'
                    ]
                ], 401);
            }

            // Obtener usuario autenticado
            $user = Auth::user();

            // Revocar tokens anteriores
            $user->tokens()->delete();

            // Crear nuevo token
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => [
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'userId' => $user->id,
                ]
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'message' => 'Error de validación',
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error en el login: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error en el servidor durante el login',
                'error' => env('APP_DEBUG') ? $e->getMessage() : 'Error interno'
            ], 500);
        }
    }

   
    public function logout()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'No hay sesión activa'], 401);
        }

        $user->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }

    public function getAuthenticatedUser()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json(['message' => 'Usuario no autenticado'], 401);
            }
            

            return response()->json([
                'user' => [
                    'username' => $user->username,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'lastname' => $user->lastname,
                    'bio' => $user->bio,
                    'name' => $user->name,
                ],
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener el usuario',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

   
}
