<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator as ValidationValidator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectsController extends Controller
{
    private function getValidationMessages()
    {
        return [
            'etapa.required' => 'El campo etapa es obligatorio.',
            'etapa.integer' => 'La etapa debe ser un número entero.',
            'etapa.min' => 'La etapa no puede ser anterior a 2018.',

            'titulo.required' => 'El título es obligatorio.',
            'titulo.string' => 'El título debe ser una cadena de texto.',
            'titulo.min' => 'El título debe tener como mínimo 10 caracteres',
            'titulo.max' => 'El título no puede exceder los 50 caracteres.',

            'resumen.required' => 'El resumen es obligatorio.',
            'resumen.string' => 'El resumen debe ser una cadena de texto.',
            'resumen.min' => 'El resumen debe tener como mínimo 100 caracteres.',
            'resumen.max' => 'El resumen no puede exceder los 255 caracteres.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.min' => 'La descripción debe tener como mínimo 50 caracteres',
            'descripcion.max' => 'La descripción no puede exceder los 255 caracteres.',

            'etiqueta.required' => 'La etiqueta es obligatoria.',
            'etiqueta.in' => 'La etiqueta seleccionada no es válida. Opciones: Infraestructura, Tecnología, Consultoría, Vivienda, Construcción u Otros.',

            'portada.required' => 'La imagen de portada es obligatoria.',
            'portada.image' => 'El archivo debe ser una imagen válida.',
            'portada.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, webp o gif.',
            'portada.max' => 'La imagen no puede pesar más de 2MB.'
        ];
    }

    // Llamar a todos los proyectos
    public function index()
    {
        try {
            $Projects = Projects::all()->map(function ($project) {
                return [
                    'id' => $project->id,
                    'titulo' => $project->titulo,
                    'descripcion' => $project->descripcion,
                    'resumen' => $project->resumen,

                    // Para las imagenes en el hostinger es importante cambiar la ruta
                    // 'portada' => $project->portada ? asset("storage/app/public/{$project->portada}") : null,
                    'portada' => $project->portada ? asset("storage/{$project->portada}") : null,

                    'etiqueta' => $project->etiqueta,
                    'etapa' => $project->etapa,
                ];
            });

            return response()->json([
                'projects' => $Projects,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener projects',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Crear un proyecto
    public function store(Request $request)
    {
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            // Validar los datos manualmente
            $validator = Validator::make($request->all(), [
                'etapa' => 'required|integer|min:2018',
                'titulo' => 'required|string|min:10|max:50',
                'resumen' => 'required|string|min:100|max:255',
                'descripcion' => 'required|string|min:50|max:255',
                'etiqueta' => 'required|in:Infraestructura,Tecnología,Consultoría,Vivienda,Construcción,Otros',
                'portada' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            ], $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error al validar los datos',
                    'error' => $validator->errors(),
                    'status' => 400
                ], 400);
            }

            // Subir y guardar la imagen (portada)
            $portadaPath = $request->file('portada')->store('images', 'public');

            // Crear el proyecto
            $project = Projects::create([
                'etapa' => $request->etapa,
                'titulo' => $request->titulo,
                'resumen' => $request->resumen,
                'descripcion' => $request->descripcion,
                'etiqueta' => $request->etiqueta,
                'portada' => $portadaPath,
            ]);

            (new NotificationService())->notifySubscribers($project, 'project');

            return response()->json([
                'message' => 'Proyecto creado exitosamente',
                'project_id' => $project->id,
                'status' => 201
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear el proyecto: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error en la creación del proyecto',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }

    // Llamar a uno unico
    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return response()->json($project, 200);
    }

    // Actualizar un proyecto
    public function update(Request $request, $id)
    {
        $project = Projects::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'etapa' => 'required|integer|min:2018',
            'titulo' => 'required|string|min:10|max:50',
            'resumen' => 'required|string|min:100|max:255',
            'descripcion' => 'required|string|min:50|max:255',
            'etiqueta' => 'required|in:Infraestructura,Tecnología,Consultoría,Vivienda,Construcción,Otros',
            'portada' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ], $this->getValidationMessages());

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de proyectos',
                'status' => 400,
                'error' => $validator->errors()
            ], 400);
        }

        $data = $validator->validated();

        // Manejo de imagen portada
        if ($request->hasFile('portada')) {
            $portadaPath = $request->file('portada')->store('images', 'public');
            $data['portada'] = $portadaPath;
        }

        $project->update($data);

        return response()->json($project, 200);
    }

    // Eliminar un proyecto
    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Proyecto eliminado.'], 200);
    }
}
