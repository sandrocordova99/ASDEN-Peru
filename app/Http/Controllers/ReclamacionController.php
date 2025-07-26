<?php

namespace App\Http\Controllers;

use App\Models\Reclamacion;  // Asegúrate de importar el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReclamacionController extends Controller
{
    private function getValidationMessages()
    {
        return [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.max' => 'El nombre no puede tener más de 30 caracteres.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',

            'apellido.required' => 'El apellido es requerido.',
            'apellido.max' => 'El apellido no puede tener más de 30 caracteres.',
            'apellido.regex' => 'El apellido solo puede contener letras y espacios.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.min' => 'El correo debe tener como mínimo 10 caracteres',
            'email.max' => 'El correo no puede tener más de 50 caracteres.',

            'documento.required' => 'El tipo de documento es requerido.',

            'numeroDocumento.required' => 'El número de documento es requerido.',

            'celular.required' => 'El número de celular es requerido.',

            'direccion.required' => 'La dirección es requerida.',
            'direccion.max' => 'La dirección no puede tener más de 40 caracteres',

            'distrito.required' => 'El distrito es requerido.',
            'distrito.regex' => 'El distrito solo puede contener letras y espacios.',
            'distrito.max' => 'El distrito no puede tener más de 40 caracteres',

            'ciudad.required' => 'La ciudad es requerida.',
            'ciudad.regex' => 'La ciudad solo puede contener letras y espacios.',
            'ciudad.max' => 'La ciudadS no puede tener más de 40 caracteres',

            'tipoReclamo.required' => 'El tipo de reclamo es requerido.',

            'fechaIncidente.required' => 'La fecha de incidente es requerida.',

            'reclamoPerson.required' => 'La descripción del incidente es requerida.',
            'reclamoPerson.max' => 'La descripción no puede tener más de 500 caracteres.',

        ];
    }

    // Método para almacenar la reclamación en la base de datos
    public function store(Request $request)
    {
        try {
            // Validación de los datos (puedes agregar reglas de validación aquí si lo deseas)
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:30|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'apellido' => 'required|string|max:30|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'documento' => 'required',
                'numeroDocumento' => 'required',
                'email' => [
                    'required',
                    'email',
                    'max:50',
                    'min:10',
                    function ($attribute, $value, $fail) {
                        if (!preg_match('/@(hotmail|outlook|gmail)\.com$/', $value)) {
                            $fail('El correo debe ser de dominio hotmail.com, outlook.com o gmail.com.');
                        }
                    }
                ],
                'celular' => 'required',
                'direccion' => 'required|max:40',
                'distrito' => 'required|regex:/^[\pL\s]+$/u|max:40',
                'ciudad' => 'required|regex:/^[\pL\s]+$/u|max:40',
                'tipoReclamo' => 'required',
                'fechaIncidente' => 'required|date',
                'reclamoPerson' => 'required|max:500',
            ], $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error al ingresar datos del reclamo',
                    'status' => 400,
                    'error' => $validator->errors()
                ], 400);
            }

            // Crear una nueva reclamación en la base de datos
            $reclamacion = Reclamacion::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'documento' => $request->documento,
                'numeroDocumento' => $request->numeroDocumento,
                'email' => $request->email,
                'celular' => $request->celular,
                'direccion' => $request->direccion,
                'distrito' => $request->distrito,
                'ciudad' => $request->ciudad,
                'tipoReclamo' => $request->tipoReclamo,
                'fechaIncidente' => $request->fechaIncidente,
                'reclamoPerson' => $request->reclamoPerson,
                'estado' => 'Pendiente',
            ]);

            return response()->json([
                'message' => 'Reclamacion creada exitosamente',
                'reclamo' => $reclamacion,
                'status' => 201,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creando reclamo: ' . $e->getMessage());
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,

            ], 500);
        }
    }

    public function getAll()
    {
        try {
            // Obtener todos los reclamos
            $reclamaciones = Reclamacion::all();
            return response()->json([
                'Reclamaciones' => $reclamaciones,  // Cambié 'Reclamacion' a 'reclamaciones'
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener reclamaciones',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // public function libroReclamaciones()
    // {
    //     // Obtener todas las reclamaciones
    //     $reclamaciones = Reclamacion::all();
    //     // Pasar las reclamaciones a la vista
    //     return view('reclamaciones.libroReclamaciones', compact('reclamaciones'));
    // }


    public function cambiarEstado($id)
    {
        try {
            $reclamo = Reclamacion::findOrFail($id);

            $nuevoEstado = $reclamo->estado === 'Pendiente' ? 'Atendido' : 'Pendiente';
            $reclamo->estado = $nuevoEstado;
            $reclamo->save();

            return response()->json([
                'message' => 'Estado actualizado correctamente',
                'nuevoEstado' => $nuevoEstado,
                'status' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al cambiar el estado',
                'status' => 500,
                'error' => $e->getMessage()  // Te mostrará el detalle del error
            ]);
        }
    }
}
