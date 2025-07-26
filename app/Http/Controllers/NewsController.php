<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Exception;
use App\Models\Noticias;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

class NewsController extends Controller
{

    private function getValidationMessages()
    {
        return [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.string' => 'El título debe ser una cadena de texto.',
            'titulo.min' => 'El título debe tener como mínimo 10 caracteres',
            'titulo.max' => 'El título no puede exceder los 50 caracteres.',

            'subtitulo_1.required' => 'El subtítulo es obligatorio.',
            'subtitulo_1.string' => 'El subtítulo debe ser una cadena de texto.',
            'subtitulo_1.min' => 'El subtítulo debe tener como mínimo 5 caracteres.',
            'subtitulo_1.max' => 'El subtítulo debe tener como máximo 50 caracteres.',

            'subtitulo_2.required' => 'El subtítulo es obligatorio.',
            'subtitulo_2.string' => 'El subtítulo debe ser una cadena de texto.',
            'subtitulo_2.min' => 'El subtítulo debe tener como mínimo 5 caracteres.',
            'subtitulo_2.max' => 'El subtítulo debe tener como máximo 50 caracteres.',

            'subtitulo_3.required' => 'El subtítulo es obligatorio.',
            'subtitulo_3.string' => 'El subtítulo debe ser una cadena de texto.',
            'subtitulo_3.min' => 'El subtítulo debe tener como mínimo 5 caracteres.',
            'subtitulo_3.max' => 'El subtítulo debe tener como máximo 50 caracteres.',

            'parrafo_1.required' => 'El primer párrafo es obligatorio.',
            'parrafo_1.string' => 'La descripción debe ser una cadena de texto.',
            'parrafo_1.min' => 'La descripción debe tener como mínimo 300 caracteres',
            'parrafo_1.max' => 'La descripción no puede exceder los 650 caracteres',

            'parrafo_2.required' => 'El segundo párrafo es obligatorio.',
            'parrafo_2.string' => 'El segundo párrafo debe ser una cadena de texto.',
            'parrafo_2.min' => 'El segundo párrafo debe tener como mínimo 450 caracteres',
            'parrafo_2.max' => 'El segundo párrafo no puede exceder los 850 caracteres',

            'parrafo_3.required' => 'El tercer párrafo es obligatorio.',
            'parrafo_3.string' => 'El tercer párrafo debe ser una cadena de texto.',
            'parrafo_3.min' => 'El tercer párrafo debe tener como mínimo 450 caracteres',
            'parrafo_3.max' => 'El tercer párrafo no puede exceder los 850 caracteres',

            'resumen.required' => 'El resumen es obligatorio.',
            'resumen.string' => 'El resumen debe ser una cadena de texto.',
            'resumen.min' => 'El resumen debe tener como mínimo 100 caracteres.',
            'resumen.max' => 'El resumen no puede exceder los 255 caracteres.',

            'tags.required' => 'Debe seleccionar al menos un tag.',
            'tags.in' => 'El tag seleccionado no es válido.',

            'portada.required' => 'La portada es requerida',
            'portada.image' => 'El archivo debe ser una imagen.',
            'portada.mimes' => 'La portada debe ser de tipo: jpeg, png, jpg, webp o gif.',
            'portada.max' => 'La portada no puede pesar más de 2MB.',
            'portada.dimensions' => 'La portada debe ser 16:9, mínimo 1200x630px y máximo 2560x1440px.',

            'imagen_1.required' => 'La imagen es obligatoria.',
            'imagen_1.image' => 'El archivo debe ser una imagen.',
            'imagen_1.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, webp o gif.',
            'imagen_1.max' => 'La imagen no puede pesar más de 2MB.',
            'imagen_1.dimensions' => 'La imagen debe ser mínimo 800x450px y máximo 1920x1080px.',
            'imagen_1.ratio' => 'La imagen debe tener relación de aspecto 16:9.',

            'imagen_2.image' => 'El archivo debe ser una imagen.',
            'imagen_2.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, webp o gif.',
            'imagen_2.max' => 'La imagen no puede pesar más de 2MB.',
            'imagen_2.dimensions' => 'La imagen debe ser mínimo 800x450px y máximo 1920x1080px.',
            'imagen_2.ratio' => 'La imagen debe tener relación de aspecto 16:9.',

            'imagen_3.image' => 'El archivo debe ser una imagen.',
            'imagen_3.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, webp o gif.',
            'imagen_3.max' => 'La imagen no puede pesar más de 3MB.',
            'imagen_3.dimensions' => 'La imagen debe ser mínimo 800x450px y máximo 1920x1080px.',
            'imagen_3.ratio' => 'La imagen debe tener relación de aspecto 16:9.',
        ];
    }

    //php artisan make:controller ContactoController -–resource
    public function news(Request $request)
    {
        //
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:50|min:10',

                'subtitulo_1' => 'required|string|max:50|min:5',
                'subtitulo_2' => 'required|string|max:50|min:5',
                'subtitulo_3' => 'required|string|max:50|min:5',

                'parrafo_1' => 'required|string|min:300|max:650',
                'parrafo_2' => 'required|string|min:450|max:850',
                'parrafo_3' => 'required|string|min:450|max:850',

                'resumen' => 'required|string|max:255|min:100',

                'tags' => 'required|in:Medio Ambiente,Energías,Biodiversidad,Agricultura,Recursos Naturales,Desarrollo Sostenible',
                'portada' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=1200,min_height=630,max_width=2560,max_height=1440,ratio=16/9',
                'imagen_1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=300,min_height=300,max_width=1024,max_height=1024',
                'imagen_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080',
                'imagen_3' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080'

            ], $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de noticias',
                    'status' => 400,
                    'error' => $validator->errors()
                ], 400);
            }

            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'message' => 'Usuario no encontrado',
                    'status' => 404
                ], 404);
            }

            $portada = null;
            if ($request->hasFile('portada')) {
                $portada = $request->file('portada')->store('avatars', 'public');
            }

            $imagen_1 = null;
            if ($request->hasFile('imagen_1')) {
                $imagen_1 = $request->file('imagen_1')->store('avatars', 'public');
            }

            $imagen_2 = null;
            if ($request->hasFile('imagen_2')) {
                $imagen_2 = $request->file('imagen_2')->store('avatars', 'public');
            }

            $imagen_3 = null;
            if ($request->hasFile('imagen_3')) {
                $imagen_3 = $request->file('imagen_3')->store('avatars', 'public');
            }

            $descripcion = [
                'parrafo_1' => [
                    'subtitulo' => $request->subtitulo_1,
                    'contenido' => $request->parrafo_1,
                ],
                'parrafo_2' => $request->parrafo_2 ? [
                    'subtitulo' => $request->subtitulo_2,
                    'contenido' => $request->parrafo_2,
                ] : null,
                'parrafo_3' => $request->parrafo_3 ? [
                    'subtitulo' => $request->subtitulo_3,
                    'contenido' => $request->parrafo_3,
                ] : null,
            ];

            $new = Noticias::create([
                'titulo' => $request->titulo,
                'descripcion' => json_encode($descripcion),
                'portada' => $portada,
                'resumen' => $request->resumen,
                'imagen_1' => $imagen_1,
                'imagen_2' => $imagen_2,
                'imagen_3' => $imagen_3,
                'tags' => $request->tags,
                'user_id' => $user->id,
                'username' => $user->username,
            ]);

            // Enviar correo a suscriptores
            (new NotificationService())->notifySubscribers($new, 'new');

            return response()->json([
                'message' => 'Noticia creado exitosamente',
                'usuario' => $new,
                'status' => 201,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creando noticia: ' . $e->getMessage());
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,

            ], 500);
        }
    }

    public function show($id)
    {
        $noticia = Noticias::findOrFail($id);

        if (!$noticia) {
            abort(404);
        }

        return view('noticias.informacion', compact('noticia'));
    }

    public function getNoticia(string $id, Request $request)
    {
        try {
            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $noticia = Noticias::find($id);

            if (!$noticia) {
                return response()->json([
                    'message' => 'noticia con ID no encontrada',
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'message' => 'noticia encontrada con exito',
                'status' => 200,
                'noticia' => $noticia,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al encontrar el trabajo',
                'status' => 500,
            ], 500);
        }
    }

    public function getAllNoticias()
    {
        try {

            $Noticias = Noticias::all()->map(function ($noticia) {
                return [
                    'id' => $noticia->id,
                    'titulo' => $noticia->titulo,
                    'descripcion' => $noticia->descripcion,
                    'resumen' => $noticia->resumen,

                    // Para las imagenes en el hostinger es importante cambiar la ruta
                    // 'portada' => $noticia->portada ? asset("storage/app/public/{$noticia->portada}") : null,
                    // 'imagen_1' => $noticia->imagen_1 ? asset("storage/app/public/{$noticia->imagen_1}") : null,
                    // 'imagen_2' => $noticia->imagen_2 ? asset("storage/app/public/{$noticia->imagen_2}") : null,
                    // 'imagen_3' => $noticia->imagen_3 ? asset("storage/app/public/{$noticia->imagen_3}") : null,
                    'portada' => $noticia->portada ? asset("storage/{$noticia->portada}") : null,
                    'imagen_1' => $noticia->imagen_1 ? asset("storage/{$noticia->imagen_1}") : null,
                    'imagen_2' => $noticia->imagen_2 ? asset("storage/{$noticia->imagen_2}") : null,
                    'imagen_3' => $noticia->imagen_3 ? asset("storage/{$noticia->imagen_3}") : null,

                    'fecha' => $noticia->created_at->format('d-m-Y'),
                    'tags' => $noticia->tags,
                    'username' => $noticia->username,


                ];
            });

            return response()->json([
                'Noticias' => $Noticias,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener Noticias',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAllNoticiasById(Request $request)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            return response()->json([
                'message' => 'No autorizado',
                'status' => 403
            ], 403);
        }

        try {
            $Noticias = Noticias::where('user_id', $request->user()->id)->get()->map(function ($noticia) {
                return [
                    'id' => $noticia->id,
                    'titulo' => $noticia->titulo,
                    'descripcion' => $noticia->descripcion,
                    'resumen' => $noticia->resumen,
                    // Para las imagenes del Hostinger es necesario cambiar las rutas
                    // 'portada' => $noticia->portada ? asset("storage/app/public/{$noticia->portada}") : null,
                    // 'imagen_1' => $noticia->imagen_1 ? asset("storage/app/public/{$noticia->imagen_1}") : null,
                    // 'imagen_2' => $noticia->imagen_2 ? asset("storage/app/public/{$noticia->imagen_2}") : null,
                    // 'imagen_3' => $noticia->imagen_3 ? asset("storage/app/public/{$noticia->imagen_3}") : null,
                    'portada' => $noticia->portada ? asset("storage/{$noticia->portada}") : null,
                    'imagen_1' => $noticia->imagen_1 ? asset("storage/{$noticia->imagen_1}") : null,
                    'imagen_2' => $noticia->imagen_2 ? asset("storage/{$noticia->imagen_2}") : null,
                    'imagen_3' => $noticia->imagen_3 ? asset("storage/{$noticia->imagen_3}") : null,
                    'fecha' => $noticia->created_at->format('d-m-Y'),
                    'tags' => $noticia->tags,
                    'username' => $noticia->username,
                ];
            });

            return response()->json([
                'Noticias' => $Noticias,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener Noticias',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function destroyNews(string $id, Request $request)
    {
        //
        try {

            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $Noticias = Noticias::find($id);

            if (!$Noticias) {
                return response()->json([
                    'message' => 'ID no encontrado',
                    'status' => 404,
                ], 404);
            }

            $Noticias->delete();

            return response()->json([
                'message' => 'Noticias eliminado con exito',
                'status' => 200,
                'id' => $Noticias->id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,

            ], 500);
        }
    }

    public function updateNoticia(Request $request, $id)
    {
        try {
            if (!$request->user() || $request->user()->role !== 'admin') {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $noticia = Noticias::find($id);
            if (!$noticia) {
                return response()->json([
                    'message' => 'Noticia no encontrada',
                    'status' => 404
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:50|min:10',

                'subtitulo_1' => 'required|string|max:50|min:5',
                'subtitulo_2' => 'required|string|max:50|min:5',
                'subtitulo_3' => 'required|string|max:50|min:5',

                'parrafo_1' => 'required|string|min:300|max:650',
                'parrafo_2' => 'required|string|min:450|max:850',
                'parrafo_3' => 'required|string|min:450|max:850',

                'resumen' => 'required|string|max:255|min:100',

                'tags' => 'required|in:Medio Ambiente,Energías,Biodiversidad,Agricultura,Recursos Naturales,Desarrollo Sostenible',
                'portada' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=1200,min_height=630,max_width=2560,max_height=1440,ratio=16/9',
                'imagen_1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=300,min_height=300,max_width=1024,max_height=1024',
                'imagen_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080',
                'imagen_3' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080'
            ],  $this->getValidationMessages());


            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de noticias',
                    'status' => 400,
                    'error' => $validator->errors()
                ], 400);
            }

            $contenido = [
                'parrafo_1' => [
                    'subtitulo' => $request->subtitulo_1,
                    'contenido' => $request->parrafo_1
                ],
                'parrafo_2' => $request->parrafo_2 ? [
                    'subtitulo' => $request->subtitulo_2,
                    'contenido' => $request->parrafo_2,
                ] : null,
                'parrafo_3' => $request->parrafo_3 ? [
                    'subtitulo' => $request->subtitulo_3,
                    'contenido' => $request->parrafo_3,
                ] : null,
            ];

            // Actualizar campos
            $noticia->titulo = $request->titulo;
            $noticia->descripcion = json_encode($contenido);
            $noticia->resumen = $request->resumen;
            $noticia->tags = $request->tags;

            if ($request->hasFile('portada')) {
                $noticia->portada = $request->file('portada')->store('avatars', 'public');
            }

            if ($request->hasFile('imagen_1')) {
                $noticia->imagen_1 = $request->file('imagen_1')->store('avatars', 'public');
            }

            if ($request->hasFile('imagen_2')) {
                if ($noticia->imagen_2) {
                    Storage::disk('public')->delete($noticia->imagen_2);
                }
                $noticia->imagen_2 = $request->file('imagen_2')->store('avatars', 'public');
            } elseif ($request->has('imagen_2_deleted') || $request->input('imagen_2') === "") {
                if ($noticia->imagen_2) {
                    Storage::disk('public')->delete($noticia->imagen_2);
                }
                $noticia->imagen_2 = null;
            }

            if ($request->hasFile('imagen_3')) {
                if ($noticia->imagen_3) {
                    Storage::disk('public')->delete($noticia->imagen_3);
                }
                $noticia->imagen_3 = $request->file('imagen_3')->store('avatars', 'public');
            } elseif ($request->has('imagen_3_deleted') || $request->input('imagen_3') === "") {
                if ($noticia->imagen_3) {
                    Storage::disk('public')->delete($noticia->imagen_3);
                }
                $noticia->imagen_3 = null;
            }

            $noticia->save();

            return response()->json([
                'message' => 'Noticia actualizada con éxito',
                'noticia' => $noticia,
                'status' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}

/**
 *  
 * @param \Illuminate\Http\Request $request
 * @return mixed|\Illuminate\Http\JsonResponse
 */
