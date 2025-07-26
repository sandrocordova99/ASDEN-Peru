<?php

namespace App\Http\Controllers;

use App\Models\UserASDEN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Exception;
use App\Mail\AccountInvitationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class UserASDENController extends Controller
{
    private function getValidationMessages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 30 caracteres.',
            'name.regex' => 'El nombre solo puede contener letras y espacios.',

            'lastname.required' => 'El apellido es obligatorio.',
            'lastname.max' => 'El apellido no puede tener más de 30 caracteres.',
            'lastname.regex' => 'El apellido solo puede contener letras y espacios.',

            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.max' => 'El nombre de usuario no puede tener más de 30 caracteres.',
            'username.unique' => 'Este nombre de usuario ya está en uso.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.max' => 'El correo no puede tener más de 50 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'avatar.required' => 'Debes seleccionar una imagen de perfil.',
            'avatar.image' => 'El archivo debe ser una imagen.',
            'avatar.mimes' => 'La imagen debe ser JPEG, PNG, JPG o WEBP.',
            'avatar.max' => 'La imagen no puede pesar más de 2MB.',
            'avatar.dimensions' => 'La imagen debe tener entre 300x300px y 1024x1024px',

            'site.active_url' => 'La URL ingresada no existe.',
            'site.url' => 'El campo debe ser una URL válida (ej: https://ejemplo.com/imagen.jpg).',
            'site.starts_with' => 'La URL debe comenzar con https:// por seguridad',
            'site.ends_with' => 'Solo se aceptan imágenes con formato .jpg, .jpeg, .png, .gif o .web',

            'bio.max' => 'La biografía no puede tener más de 150 caracteres.',
            'role.in' => 'El rol seleccionado no es válido.',
        ];
    }

    public function register(Request $request)
    {
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:30|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'lastname' => 'required|string|max:30|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'username' => 'required|string|max:30|unique:user_a_s_d_e_n_s',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:50',
                    'unique:user_a_s_d_e_n_s',
                    function ($attribute, $value, $fail) {
                        if (!preg_match('/@(hotmail|outlook|gmail)\.com$/', $value)) {
                            $fail('El correo debe ser de dominio hotmail.com, outlook.com o gmail.com.');
                        }
                    }
                ],

                'site' => 'nullable|url|active_url|starts_with:https://|ends_with:.jpg,.jpeg,.png,.webp',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=300,min_height=300,max_width=1024,max_height=1024',
                'bio' => 'nullable|string|max:150',
                'role' => 'required|in:admin,user',
            ], $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error al ingresar datos del usuario',
                    'status' => 400,
                    'error' => $validator->errors()
                ], 400);
            }

            $avatarPath = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';

            if ($request->hasFile('avatar')) {
                $avatarFile = $request->file('avatar');
                $avatarName = time() . '_' . $avatarFile->getClientOriginalName();
                $avatarPath = $avatarFile->storeAs('avatars', $avatarName, 'public');
            } elseif ($request->filled('site')) {
                $avatarPath = $request->input('site');
                if (!filter_var($avatarPath, FILTER_VALIDATE_URL)) {
                    return back()->withErrors(['site' => 'La URL proporcionada no es válida']);
                }
            }

            $user = UserASDEN::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $avatarPath,
                'bio' => $request->bio,
                'role' => $request->role ?? 'user',
                'invitation_token' => Str::random(32),
                'invitation_expires_at' => now()->addHours(24),
            ]);

            try {
                Mail::to($user->email)->send(new AccountInvitationMail($user));
            } catch (\Exception $e) {
                Log::error('Error al enviar correo de invitación: ' . $e->getMessage());
            }

            return response()->json([
                'message' => 'Usuario creado exitosamente',
                'usuario' => $user->id,
                'status' => 201,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creando usuario: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error en la creación de usuario',
                'status' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $rules = [
                'name' => 'required|string|max:30|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'lastname' => 'required|string|max:30|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'username' => 'required|string|max:30|unique:user_a_s_d_e_n_s,username,' . $request->id,  // Excluye usuario actual
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:50',
                    'unique:user_a_s_d_e_n_s,email,' . $request->id,  // Excluye usuario actual
                    function ($attribute, $value, $fail) {
                        if (!preg_match('/@(hotmail|outlook|gmail)\.com$/', $value)) {
                            $fail('El correo debe ser de dominio hotmail.com, outlook.com o gmail.com.');
                        }
                    }
                ],
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=300,min_height=300,max_width=1024,max_height=1024',
                'bio' => 'nullable|string|max:150',
                'role' => 'required|in:admin,user',
            ];

            $validator = Validator::make($request->all(), $rules, $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en los datos del usuario',
                    'status' => 400,
                    'error' => $validator->errors()
                ], 400);
            }
            $user = UserASDEN::find($id);

            if (!$user) {
                return response()->json([
                    'message' => 'Error al encontrar ID',
                    'status' => 404
                ], 404);
            }

            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = $avatarPath;
            }

            $user->fill($request->except(['password', 'avatar']));

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json([
                'message' => 'Usuario actualizado con éxito',
                'status' => 200,
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar usuario',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        //
        try {

            $user = Auth::user();

            if (!$user) {
                return response()->json(['message' => 'Usuario no autenticado'], 401);
            }

            $user = UserASDEN::find($id);

            if (!$user) {
                return response()->json([
                    'message' => 'ID no encontrado',
                    'status' => 404,
                ], 404);
            }

            $user->delete();

            return response()->json([
                'message' => 'Usuario eliminado con exito',
                'status' => 200,
                'id' => $user->id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el usuario',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getUser(string $id, Request $request)
    {
        //
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {

                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $user = UserASDEN::find($id);

            if (!$user) {
                return response()->json([
                    'message' => 'Usuario con ID no encontrado',
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'message' => 'Usuario encontrado con exito',
                'status' => 200,
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al encontrar el usuario',
                'status' => 500,
            ], 500);
        }
    }

    public function getAllUsers()
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json(['message' => 'Usuario no autenticado'], 401);
            }

            $users = UserASDEN::all()->map(function ($user) {

                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'lastname' => $user->lastname,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'bio' => $user->bio,

                    // RUTA PARA HOSTINGER
                    // 'avatar' => str($user->avatar ?? '')->startsWith(['http://', 'https://']) ? $user->avatar : asset("storage/app/public//{$user->avatar}"),
                    'avatar' => str($user->avatar ?? '')->startsWith(['http://', 'https://']) ? $user->avatar : asset("storage/{$user->avatar}"),
                    'created_at' => $user->created_at ? $user->created_at->format('d-m-Y') : null,

                ];
            });

            $totalUsers = UserASDEN::count();
            $totalAdmins = UserASDEN::where('role', 'admin')->count();
            $totalUsersRole = UserASDEN::where('role', 'user')->count();

            return response()->json([
                'total' => $totalUsers,
                'totalAdmins' => $totalAdmins,
                'totalUsersRole' => $totalUsersRole,
                'users' => $users,
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener usuarios',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function perfil()
    {
        $user = auth()->user();
        return view('auth.perfil', compact('user'));
    }


    public function editarPerfil()
    {
        $user = auth()->user();
        return view('perfil.editar', compact('user')); // O el nombre correcto de la vista
    }

    public function perfilAdmin()
    {
        $admin = auth()->user();
        return view('auth.perfilAdmin', compact('admin'));
    }

    public function editarPerfilAdmin()
    {
        $admin = auth()->user();
        return view('auth.editarPerfilAdmin', compact('admin'));
    }

    public function getAdminInfo()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json(['message' => 'Usuario no autenticado'], 401);
            }

            if ($user->role !== 'admin') {
                return response()->json(['message' => 'Acceso no autorizado'], 403);
            }

            // Aquí puedes poner la info que quieres devolver solo para admins
            return response()->json([
                'admin' => [
                    'username' => $user->username,
                    'email' => $user->email,
                    'name' => $user->name,
                    'lastname' => $user->lastname,
                    'avatar' => $user->avatar,
                    'bio' => $user->bio,
                    // cualquier otro dato exclusivo de admin
                ],
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener información de admin',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();


            if (!$user) {
                return response()->json(['message' => 'No autenticado'], 401);
            }

            // Validar datos
            $validated = $request->validate([
                'name' => 'nullable|string|max:50',
                'lastname' => 'nullable|string|max:50',
                'username' => 'nullable|string|max:50|unique:user_a_s_d_e_n_s,username,' . $user->id,
                'bio' => 'nullable|string|max:255',
                'username' => 'nullable|string|max:50|unique:user_a_s_d_e_n_s,username,' . $user->id,
            ]);

            // Actualizar solo si viene valor
            if (isset($validated['name'])) $user->name = $validated['name'];
            if (isset($validated['lastname'])) $user->lastname = $validated['lastname'];
            if (isset($validated['username'])) $user->username = $validated['username'];
            if (isset($validated['bio'])) $user->bio = $validated['bio'];
            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    Storage::disk('public')->delete($user->avatar);
                }
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = $avatarPath;
            }

            $user->save();

            return response()->json([
                'message' => 'Perfil actualizado correctamente',
                'user' => $user
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar perfil',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
