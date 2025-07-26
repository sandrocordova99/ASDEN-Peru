<?php

namespace App\Http\Controllers;

use App\Models\Trabajos;
use App\Models\Solicitudes;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        //
        try {
            $trabajo = Trabajos::where('id', $id)->first();
            if (!$trabajo) {
                return response()->json(
                    [
                        'message' => 'El trabajo no existe',
                        'ID' => $id
                    ],
                    404
                );
            }

            $validator = Validator::make($request->all(), [
                'trabajo_id' => 'string|max:255',
                'nombre' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'apellido' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'direccion' => 'required|string|max:255',
                'telefono' => 'required|string|max:20',
                'dni' => 'required|string|max:25|unique:solicitudes',
                'cv' => 'required|file|mimes:pdf|max:2048',
                'estado' => 'string|in:Pendiente,Aceptado,Rechazado',

                'salario' => 'required|numeric',
                'provincia' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:30',
                    'unique:solicitudes',
                    function ($attribute, $value, $fail) {
                        if (!preg_match('/@(hotmail|outlook|gmail)\.com$/', $value)) {
                            $fail('El correo debe ser de dominio hotmail.com, outlook.com o gmail.com.');
                        }
                    }
                ],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en validar datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }

            if ($request->hasFile('cv')) {

                $file = $request->file('cv');
                $fileName = time() . '-' . $file->getClientOriginalName();
                $filePath = $file->storeAs('cvs', $fileName, 'public');

            } else {
                return response()->json(['message' => 'El archivo CV es requerido'], 400);
            }

            $Solicitudes = Solicitudes::create([
                // 'id' => $request->id,
                'trabajo_id' => $trabajo->id,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'dni' => $request->dni,
                'cv' => $filePath,
            ]);

            return response()->json([
                'message' => 'Solicitudes enviada',
                'usuario' => $Solicitudes->id,
                'status' => 201,
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error al crear Solicitud',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $solicitud = Solicitudes::find($id);

            if (!$solicitud) {
                return response()->json([
                    'message' => 'Solicitud no encontrada',
                    'status' => 404
                ], 404);
            }

            $validatedData = $request->validate([
                'nombre'     => 'sometimes|string|max:255',
                'apellido'   => 'sometimes|string|max:255',
                'direccion'  => 'sometimes|string|max:255',
                'telefono'   => 'sometimes|regex:/^9\d{8}$/',
                'dni'        => 'sometimes|digits:8',
                'cv'         => 'sometimes|file|mimes:pdf|max:2048',
                'estado'     => 'sometimes|in:Pendiente,Aceptado,Rechazado',
            ]);
    
            // Actualización de la solicitud (merge como en el PATCH de JS)
            $solicitud->update($validatedData);
    
            // Retornar la solicitud actualizada
            return response()->json($solicitud, 200);

        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            // Si necesitas protegerlo con permisos de administrador
            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $solicitud = Solicitudes::find($id);

            if (!$solicitud) {
                return response()->json([
                    'message' => 'Solicitud no encontrada',
                    'status' => 404
                ], 404);
            }

            // Eliminar la solicitud de la base de datos
            $solicitud->delete();

            return response()->json([
                'message' => 'Solicitud eliminada correctamente',
                'status' => 200
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar la solicitud',
                'status' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function descargarCV($nombreArchivo)
    {
        try {
            $path = storage_path("app/public/cvs/" . $nombreArchivo);

            if (!file_exists($path)) {
                return response()->json(['message' => 'Archivo no encontrado'], 404);
            }

            return response()->download($path);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error al crear Solicitud',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }

    }

    public function getAllSocilicitudes(Request $request)
    {
        //
        try {

            $Solicitudes = Solicitudes::all();

            return response()->json([
                'Solicitudes' => $Solicitudes,
                'status' => 200,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener Solicitudes',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }

    }

}
