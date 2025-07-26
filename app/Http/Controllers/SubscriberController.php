<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                'max:50',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/@(hotmail|outlook|gmail)\.com$/', $value)) {
                        $fail('El correo debe ser de dominio hotmail.com, outlook.com o gmail.com.');
                    }
                }
            ],
        ], [
            'email.required' => 'El campo es requerido.',
            'email.string' => 'El email debe ser una cadena de texto.',
            'email.email' => 'El email ingresado debe ser válido.',
            'email.max' => 'El email debe tener como máximo 50 caracteres.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de suscriptor',
                'status' => 400,
                'error' => $validator->errors()
            ], 400);
        }

        $subscriber = Subscriber::where('email', $request->email)->first();

        // Si el correo ya existe y está activo
        if ($subscriber && $subscriber->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'Este correo ya está suscrito.'
            ], 409); // 409 Conflict
        }

        // Si el correo existe pero está inactivo (reactivar)
        if ($subscriber && !$subscriber->is_active) {
            $subscriber->update([
                'is_active' => true,
                'unsubscribe_token' => Str::random(32),
            ]);
            return response()->json([
                'success' => true,
                'message' => '¡Suscripción reactivada!'
            ]);
        }

        // Si el correo es nuevo
        Subscriber::create([
            'email' => $request->email,
            'is_active' => true,
            'unsubscribe_token' => Str::random(32),
        ]);

        return response()->json([
            'success' => true,
            'message' => '¡Te has suscrito correctamente!'
        ], 201); // 201 Created
    }

    public function unsubscribe($token)
    {
        $subscriber = Subscriber::where('unsubscribe_token', $token)->first();

        if ($subscriber) {
            $subscriber->update([
                'is_active' => false,
                'unsubscribe_token' => null,
            ]);
            return view('/unsubscribe_success', [
                'email' => $subscriber->email
            ]);
        }

        return redirect('/')->with('error', 'Token inválido.');
    }

    public function getAllSubscribers()
    {
        try {
            $subscribers = Subscriber::all()->map(function ($subscriber) {
                return [
                    'id' => $subscriber->id,
                    'is_active' => $subscriber->is_active,
                ];
            });

            $totalSubs = Subscriber::count();
            $activeSubs = Subscriber::where('is_active', true)->count();
            $inactiveSubs = Subscriber::where('is_active', false)->count();

            return response()->json([
                'Subscribers' => $subscribers,
                'totalSubs' => $totalSubs,
                'activeSubs' => $activeSubs,
                'inactiveSubs' => $inactiveSubs,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener suscriptores',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
