<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Exception;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Types\Model\Posts;
use Tymon\JWTAuth\Facades\JWTAuth;


class PostController extends Controller
{
    private function getValidationMessages()
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe ser una cadena de texto.',
            'title.min' => 'El título debe tener como mínimo 10 caracteres.',
            'title.max' => 'El título no debe exceder los 50 caracteres.',

            'resumen.required' => 'El resumen es obligatorio.',
            'resumen.string' => 'El resumen debe ser una cadena de texto.',
            'resumen.min' => 'El resumen debe tener como mínimo 50 caracteres.',
            'resumen.max' => 'El resumen no debe exceder los 250 caracteres.',

            'subtitulo_1.required' => 'El subtítulo es obligatorio.',
            'subtitulo_1.string' => 'El subtítulo debe ser una cadena de texto.',
            'subtitulo_1.min' => 'El subtítulo debe tener como mínimo 5 caracteres.',
            'subtitulo_1.max' => 'El subtítulo debe tener como máximo 50 caracteres.',

            'subtitulo_2.required' => 'El subtítulo es obligatorio.',
            'subtitulo_2.string' => 'El subtítulo debe ser una cadena de texto.',
            'subtitulo_2.min' => 'El subtítulo debe tener como mínimo 5 caracteres.',
            'subtitulo_2.max' => 'El subtítulo debe tener como máximo 50 caracteres.',

            'parrafo_1.required' => 'El primer párrafo es obligatorio.',
            'parrafo_1.string' => 'La descripción debe ser una cadena de texto.',
            'parrafo_1.min' => 'La descripción debe tener como mínimo 300 caracteres',
            'parrafo_1.max' => 'La descripción no puede exceder los 650 caracteres',

            'title_card_1.required' => 'El título de la tarjeta es requerido.',
            'title_card_1.string' => 'El título de la tarjeta debe ser una cadena de texto',
            'title_card_1.min' => 'El título debe tener como mínimo 5 caracteres',
            'title_card_1.max' => 'El título debe tener como máximo 50 caracteres',

            'text_card_1.required' => 'El contenido de la tarjeta es requerido',
            'text_card_1.string' => 'El contenido debe ser una cadena de texto',
            'text_card_1.min' => 'El contenido debe tener como mínimo 150 caracteres',
            'text_card_1.max' => 'El contenido debe tener como máximo 350 caracteres',

            'title_card_2.required' => 'El título de la tarjeta es requerido.',
            'title_card_2.string' => 'El título de la tarjeta debe ser una cadena de texto',
            'title_card_2.min' => 'El título debe tener como mínimo 5 caracteres',
            'title_card_2.max' => 'El título debe tener como máximo 50 caracteres',

            'text_card_2.required' => 'El contenido de la tarjeta es requerido',
            'text_card_2.string' => 'El contenido debe ser una cadena de texto',
            'text_card_2.min' => 'El contenido debe tener como mínimo 150 caracteres',
            'text_card_2.max' => 'El contenido debe tener como máximo 350 caracteres',

            'parrafo_2.required' => 'El segundo párrafo es obligatorio.',
            'parrafo_2.string' => 'El segundo párrafo debe ser una cadena de texto.',
            'parrafo_2.min' => 'El segundo párrafo debe tener como mínimo 450 caracteres',
            'parrafo_2.max' => 'El segundo párrafo no puede exceder los 850 caracteres',

            'portada.required' => 'La portada es obligatoria.',
            'portada.image' => 'El archivo debe ser una imagen válida.',
            'portada.mimes' => 'La portada debe ser de tipo: jpeg, png, jpg o webp.',
            'portada.max' => 'La portada no debe pesar más de 2MB.',
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

            'tags.required' => 'El campo de etiquetas es obligatorio.',
            'tags.min' => 'Debe haber como mínimo 1 etiqueta.',
            'tags.max' => 'Las etiquetas deben ser 5 como máximo.',
            'tags.*.distinct' => 'Los tags no pueden repetirse.',
            'tags.*.string' => 'Cada etiqueta debe ser texto.'
        ];
    }

    public function posts(Request $request)
    {
        try {
            if (!$request->user()) {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            // Convertir el string de tags a array y eliminar duplicados
            $tagsArray = array_unique(
                array_filter(
                    explode(',', $request->tags),
                    fn($tag) => !empty(trim($tag))
                )
            );

            // Crear nuevo request con los datos modificados
            $modifiedRequest = new Request($request->all());
            $modifiedRequest->merge([
                'tags' => $tagsArray
            ]);

            $validator = Validator::make($modifiedRequest->all(), [
                'title' => 'required|string|max:50|min:10',

                'subtitulo_1' => 'required|string|max:50|min:5',
                'subtitulo_2' => 'required|string|max:50|min:5',

                'parrafo_1' => 'required|string|min:300|max:650',
                'parrafo_2' => 'required|string|min:450|max:850',

                'title_card_1' => 'required|string|min:5|max:50',
                'title_card_2' => 'required|string|min:5|max:50',

                'text_card_1' => 'required|string|min:150|max:350',
                'text_card_2' => 'required|string|min:150|max:350',

                'resumen' => 'required|string|max:250|min:50',
                'tags' => 'required|array|min:1|max:5',
                'tags.*' => 'string|distinct',
                'portada' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=1200,min_height=630,max_width=2560,
                max_height=1440,ratio=16/9',
                'imagen_1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080',
                'imagen_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080',

            ], $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de blogs',
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

            $content = [
                'parrafo_1' => [
                    'subtitulo' => $request->subtitulo_1,
                    'contenido' => $request->parrafo_1,
                ],
                'parrafo_2' => [
                    'subtitulo' => $request->subtitulo_2,
                    'contenido' => $request->parrafo_2,
                ],
            ];

            $cards = [
                'card_1' => [
                    'title_card_1' => $request->title_card_1,
                    'text_card_1' => $request->text_card_1
                ],
                'card_2' => [
                    'title_card_2' => $request->title_card_2,
                    'text_card_2' => $request->text_card_2
                ],
            ];

            $post = Post::create([
                'title' => $request->title,
                'resumen' => $request->resumen,
                'content' => json_encode($content),
                'cards' => json_encode($cards),
                'portada' => $portada,
                'imagen_1' => $imagen_1,
                'imagen_2' => $imagen_2,
                'tags' => implode(',', $tagsArray),
                'username' => $user->username,
                'user_id' => $user->id
            ]);

            (new NotificationService())->notifySubscribers($post, 'post');

            return response()->json([
                'message' => 'Post creado exitosamente',
                'post' => $post,
                'status' => 201,
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creando blog: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error en la creación de blog',
                'status' => 500,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getPost(string $id, Request $request)
    {
        try {
            if (!$request->user()) {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $post = Post::find($id);

            if (!$post) {
                return response()->json([
                    'message' => 'post con ID no encontrado',
                    'status' => 404,
                ], 404);
            }

            return response()->json([
                'message' => 'post encontrada con exito',
                'status' => 200,
                'post' => $post,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al encontrar el post',
                'status' => 500,
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['message' => 'Usuario no autenticado'], 401);
            }

            $post = new Post([
                'title' => $request->title,
                'resumen' => $request->resumen,
                'content' => $request->content,
                'portada' => $request->portada,
                'tags' => $request->tags,
                'status' => $request->status,
                //  'published_at' => $request->status === 'published' ? now() : null,

            ]);

            $post->save();

            return response()->json(['message' => 'Post creado exitosamente'], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error al crear el post',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $action = 'detalle')
    {
        $post = Post::findOrFail($id);
        $tags = json_decode($post->tags, true);

        if ($action == 'editar') {
            // Si la acción es 'editar', renderiza la vista de editar
            return view('posts.editarPost', compact('post', 'tags'));
        }


        // Por defecto la vista es de detalle
        return view('posts.detalle', compact('post', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updatePost(Request $request, string $id)
    {
        try {
            if (!$request->user()) {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $post = Post::find($id);
            if (!$post) {
                return response()->json([
                    'message' => 'Post no encontrado',
                    'status' => 404
                ], 404);
            }

            $tagsArray = array_unique(
                array_filter(
                    explode(',', $request->tags),
                    fn($tag) => !empty(trim($tag))
                )
            );

            // Crear nuevo request con los datos modificados
            $modifiedRequest = new Request($request->all());
            $modifiedRequest->merge([
                'tags' => $tagsArray
            ]);

            $validator = Validator::make($modifiedRequest->all(), [
                'title' => 'required|string|max:50|min:10',

                'subtitulo_1' => 'required|string|max:50|min:5',
                'subtitulo_2' => 'required|string|max:50|min:5',

                'parrafo_1' => 'required|string|min:300|max:650',
                'parrafo_2' => 'required|string|min:450|max:850',

                'title_card_1' => 'required|string|min:5|max:50',
                'title_card_2' => 'required|string|min:5|max:50',

                'text_card_1' => 'required|string|min:150|max:350',
                'text_card_2' => 'required|string|min:150|max:350',

                'resumen' => 'required|string|max:250|min:50',
                'tags' => 'required|array|min:1|max:5',
                'tags.*' => 'string|distinct',
                'portada' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=1200,min_height=630,max_width=2560,
                max_height=1440,ratio=16/9',
                'imagen_1' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080',
                'imagen_2' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048|dimensions:min_width=800,min_height=450,max_width=1920,max_height=1080',
            ], $this->getValidationMessages());

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de blogs',
                    'status' => 400,
                    'error' => $validator->errors()
                ], 400);
            }

            $contenido = [
                'parrafo_1' => [
                    'subtitulo' => $request->subtitulo_1,
                    'contenido' => $request->parrafo_1
                ],
                'parrafo_2' => [
                    'subtitulo' => $request->subtitulo_2,
                    'contenido' => $request->parrafo_2
                ],
            ];

            $cards = [
                'card_1' => [
                    'title_card_1' => $request->title_card_1,
                    'text_card_1' => $request->text_card_1
                ],
                'card_2' => [
                    'title_card_2' => $request->title_card_2,
                    'text_card_2' => $request->text_card_2
                ],
            ];

            $post->title = $request->title;
            $post->resumen = $request->resumen;
            $post->content = json_encode($contenido);
            $post->cards = json_encode($cards);
            $post->tags = implode(',', $tagsArray);

            if ($request->hasFile('portada')) {
                $post->portada = $request->file('portada')->store('avatars', 'public');
            }

            if ($request->hasFile('imagen_1')) {
                $post->imagen_1 = $request->file('imagen_1')->store('avatars', 'public');
            }

            if ($request->hasFile('imagen_2')) {
                if ($post->imagen_2) {
                    Storage::disk('public')->delete($post->imagen_2);
                }
                $post->imagen_2 = $request->file('imagen_2')->store('avatars', 'public');
            } elseif ($request->has('imagen_2_deleted') || $request->input('imagen_2') === "") {
                if ($post->imagen_2) {
                    Storage::disk('public')->delete($post->imagen_2);
                }
                $post->imagen_2 = null;
            }

            // Guardar cambios
            $post->save();

            return response()->json([
                'message' => 'Trabajo actualizado con éxito',
                'status' => 200,
                'post' => $post->fresh()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar Trabajo',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //

        try {
            if (!$request->user()) {
                return response()->json([
                    'message' => 'No autorizado',
                    'status' => 403
                ], 403);
            }

            $Blogs = Post::find($id);

            if (!$Blogs) {
                return response()->json([
                    'message' => 'Post no encontrado',
                    'status' => 404,
                ], 404);
            }

            $Blogs->delete();

            return response()->json([
                'message' => 'Blog eliminado con exito',
                'status' => 200,
                'id' => $Blogs->id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,

            ], 500);
        }
    }

    public function getAllPostsUser()
    {
        try {
            $Post = Post::all()->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'resumen' => $post->resumen,

                    // Para las imagenes en el hostinger es importante cambiar la ruta
                    // 'portada' => $post->portada ? asset("storage/app/public/{$post->portada}") : null,
                    // 'imagen_1' => $post->imagen_1 ? asset("storage/app/public/{$post->imagen_1}") : null,
                    // 'imagen_2' => $post->imagen_2 ? asset("storage/app/public/{$post->imagen_2}") : null,
                    'portada' => $post->portada ? asset("storage/{$post->portada}") : null,
                    'imagen_1' => $post->imagen_1 ? asset("storage/{$post->imagen_1}") : null,
                    'imagen_2' => $post->imagen_2 ? asset("storage/{$post->imagen_2}") : null,
                    'tags' => $post->tags,
                    'username' => $post->user->username,
                ];
            });

            return response()->json([
                'Post' => $Post,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener Posts',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    public function getAllPostById(Request $request)
    {
        if (!$request->user()) {
            return response()->json([
                'message' => 'No autorizado',
                'status' => 403
            ], 403);
        }

        try {
            $Post = Post::where('user_id', $request->user()->id)->get()->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'resumen' => $post->resumen,

                    // Para las imagenes en el hostinger es importante cambiar la ruta
                    // 'portada' => $post->portada ? asset("storage/app/public/{$post->portada}") : null,
                    // 'imagen_1' => $post->imagen_1 ? asset("storage/app/public/{$post->imagen_1}") : null,
                    // 'imagen_2' => $post->imagen_2 ? asset("storage/app/public/{$post->imagen_2}") : null,
                    'portada' => $post->portada ? asset("storage/{$post->portada}") : null,
                    'imagen_1' => $post->imagen_1 ? asset("storage/{$post->imagen_1}") : null,
                    'imagen_2' => $post->imagen_2 ? asset("storage/{$post->imagen_2}") : null,
                    'tags' => $post->tags,
                    'user' => $post->user->id,
                ];
            });

            return response()->json([
                'Post' => $Post,
                'status' => 200,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener Posts',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function getPostsByTag(Request $request, $tag = null)
    {
        try {
            if (!$tag) {
                // Si no viene en la URL, intentamos obtenerlo del request
                $tag = $request->tag;
            }

            if (!$tag) {
                return response()->json(['error' => 'Tag es requerido'], 400);
            }

            $posts = Post::searchByTags($tag);

            return response()->json(['posts' => $posts]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener Posts',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
        // Si el tag viene como parámetro en la URL

    }
}
