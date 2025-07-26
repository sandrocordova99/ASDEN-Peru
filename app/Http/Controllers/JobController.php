<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Exception;
use App\Models\Trabajos;
use App\Services\NotificationService;

class JobController extends Controller
{
    private function getValidationMessages()
    {
        return [
            'titulo.required' => 'El título del puesto es obligatorio.',
            'titulo.string' => 'El título debe ser una cadena de texto.',
            'titulo.min' => 'El título debe tener mínimo 10 caracteres.',
            'titulo.max' => 'El título no puede exceder los 30 caracteres.',
            'titulo.regex' => 'El título solo puede contener letras y espacios.',

            'modalidad.required' => 'La modalidad de trabajo es obligatoria.',
            'modalidad.in' => 'La modalidad seleccionada no es válida.',

            'color.required' => 'El color identificador es obligatorio.',
            'color.string' => 'El color debe ser una cadena de texto.',
            'color.max' => 'El código de color no puede exceder 7 caracteres.',

            'tipo_trabajo.required' => 'El tipo de trabajo es obligatorio.',
            'tipo_trabajo.in' => 'El tipo de trabajo seleccionado no es válido.',

            'descripcion.required' => 'La descripción del puesto es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.min' => 'La descripción debe tener mínimo 50 caracteres.',
            'descripcion.max' => 'La descripción no puede exceder los 255 caracteres.',

            'cantidad_puestos.required' => 'La cantidad de puestos es obligatoria.',
            'cantidad_puestos.integer' => 'La cantidad de puestos debe ser un número entero.',
            'cantidad_puestos.max' => 'La cantidad de puestos no puede exceder 255.',
            'cantidad_puestos.min' => 'La cantidad de puestos debe ser 1 como mínimo.',

            'resumen.required' => 'El resumen del puesto es obligatorio.',
            'resumen.string' => 'El resumen debe ser una cadena de texto.',
            'resumen.min' => 'El resumen debe tener como mínimo 50 caracteres.',
            'resumen.max' => 'El resumen no puede exceder los 200 caracteres.',

            'funciones.required' => 'Las funciones del puesto son obligatorias.',
            'funciones.string' => 'Las funciones deben ser una cadena de texto.',
            'funciones.min' => 'Las funciones deben tener como mínimo 50 caracteres.',
            'funciones.max' => 'Las funciones no pueden exceder los 255 caracteres.',

            'beneficios.required' => 'Los beneficios del puesto son obligatorios.',
            'beneficios.string' => 'Los beneficios deben ser una cadena de texto.',
            'beneficios.min' => 'Los beneficios deben tener como mínimo 50 caracteres.',
            'beneficios.max' => 'Los beneficios no pueden exceder los 255 caracteres.',

            'requisitos.required' => 'Los requisitos del puesto son obligatorios.',
            'requisitos.string' => 'Los requisitos deben ser una cadena de texto.',
            'requisitos.min' => 'Los requisitos deben tener como mínimo 50 caracteres.',
            'requisitos.max' => 'Los requisitos no pueden exceder los 255 caracteres.',

            'imagen.image' => 'La imagen debe ser un archivo de imagen.',
        ];
    }

    //php artisan make:controller ContactoController -–resource
    public function jobs(Request $request)
    {
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:30|min:10|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                'modalidad' => 'required|in:Presencial,Remoto,Híbrido',
                'color' => 'required|string|max:7',
                'tipo_trabajo' => 'required|in:Jornada Completa,Jornada Parcial,Prácticas,Voluntariado',
                'descripcion' => 'required|string|min:50|max:255',
                'cantidad_puestos' => 'required|integer|max:255|min:1',
                'resumen' => 'required|string|max:200|min:50',
                'funciones' => 'required|string|max:255|min:50',
                'beneficios' => 'required|string|max:255|min:50',
                'requisitos' => 'required|string|max:255|min:50',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación para imagen
            ], $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de empleo',
                    'status' => 400,
                    'error' => $validator->errors()
                ], 400);
            }

            $job = Trabajos::create([
                'titulo' => $request->titulo,
                'color' => $request->color,
                'modalidad' => $request->modalidad,
                'tipo_trabajo' => $request->tipo_trabajo,
                'descripcion' => $request->descripcion,
                'cantidad_puestos' => $request->cantidad_puestos,
                'resumen' => $request->resumen,
                'funciones' => $request->funciones,
                'beneficios' => $request->beneficios,
                'requisitos' => $request->requisitos,
                'imagen' => $request->file('imagen') ? $request->file('imagen')->store('trabajos', 'public') : null,
            ]);

            (new NotificationService())->notifySubscribers($job, 'job');

            return response()->json([
                'message' => 'Trabajo creado exitosamente',
                'trabajo' => $job->id,
                'status' => 201,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creando usuario: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error en la creación de Empleo',
                'status' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $trabajo = Trabajos::findOrFail($id);

        if (!$trabajo) {
            abort(404);
        }

        return view('trabajos.informacion', compact('trabajo'));
    }

    public function getAllWorks()
    {
        try {
            $Trabajos = Trabajos::all()->map(function ($trabajo) {
                return [
                    'id' => $trabajo->id,
                    'titulo' => $trabajo->titulo,
                    'modalidad' => $trabajo->modalidad,
                    'tipo_trabajo' => $trabajo->tipo_trabajo,
                    'descripcion' => $trabajo->descripcion,
                    'cantidad_puestos' => $trabajo->cantidad_puestos,
                    'created_at' => $trabajo->created_at->format('d-m-Y'),
                    'updated_at' => $trabajo->updated_at->format('d-m-Y'),
                    'resumen' => $trabajo->resumen,
                    'beneficios' => $trabajo->beneficios,
                    'funciones' => $trabajo->funciones,
                    'requisitos' => $trabajo->requisitos,
                    'imagen' => $trabajo->imagen ? asset('storage/' . $trabajo->imagen) : null,
                    'color' => $trabajo->color
                ];
            });
            return response()->json([
                'trabajos' => $Trabajos,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener Trabajos',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroyJobs(string $id, Request $request)
    {
        //
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $Trabajos = Trabajos::find($id);

            if (!$Trabajos) {
                return response()->json([
                    'message' => 'ID no encontrado',
                    'status' => 404,
                ], 404);
            }

            $Trabajos->delete();

            return response()->json([
                'message' => 'Trabajos eliminado con exito',
                'status' => 200,
                'id' => $Trabajos->id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,

            ], 500);
        }
    }

    public function getJob(string $id, Request $request)
    {
        //
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {

                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $trabajo = Trabajos::find($id);

            if (!$trabajo) {
                return response()->json([
                    'message' => 'trabajo con ID no encontrado',
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'message' => 'trabajo encontrado con exito',
                'status' => 200,
                'trabajo' => $trabajo,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al encontrar el trabajo',
                'status' => 500,
            ], 500);
        }
    }

    public function updateJob(Request $request, string $id)
{
    try {
        if (!$request->user() || $request->user()->role !== 'admin') {
            return response()->json([
                'message' => 'No autorizado',
                'status' => 403
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:30|min:10|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'modalidad' => 'required|in:Presencial,Remoto,Híbrido',
            'tipo_trabajo' => 'required|in:Jornada Completa,Jornada Parcial,Prácticas,Voluntariado',
            'descripcion' => 'required|string|min:50|max:255',
            'cantidad_puestos' => 'required|integer|max:255|min:1',
            'resumen' => 'required|string|max:200|min:50',
            'funciones' => 'required|string|max:255|min:50',
            'beneficios' => 'required|string|max:255|min:50',
            'requisitos' => 'required|string|max:255|min:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $this->getValidationMessages());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en los datos del trabajo',
                'status' => 400,
                'error' => $validator->errors()
            ], 400);
        }

        $trabajo = Trabajos::find($id);

        if (!$trabajo) {
            return response()->json([
                'message' => 'Error al Trabajo ID',
                'status' => 404
            ], 404);
        }

        $data = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            if ($trabajo->imagen && \Storage::disk('public')->exists($trabajo->imagen)) {
                \Storage::disk('public')->delete($trabajo->imagen);
            }
            $path = $request->file('imagen')->store('trabajos', 'public');
            $data['imagen'] = $path;
        }
        

        $trabajo->update($data);


        return response()->json([
            'message' => 'Trabajo actualizado con éxito',
            'status' => 200,
            'trabajo' => $trabajo
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error al actualizar Trabajo',
            'status' => 500,
            'error' => $e->getMessage(),
        ], 500);
    }
}

}
