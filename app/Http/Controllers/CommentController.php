<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
{
    $request->validate([
        'author_name' => 'required|string|max:255',
        'author_email' => 'required|email|max:255',
        'content' => 'required|string',
    ]);
    

    Comment::create([
        'post_id' => $postId,
        'author_name' => $request->author_name,
        'author_email' => $request->author_email,
        'content' => $request->content,
    ]);
    

    return redirect()->back()->with('success', '¡Comentario enviado con éxito!');
}


    // Obtener todos los comentarios de un post específico
    public function getAllComments(int $postId)
    {
        try {
            // Recuperar todos los comentarios para el post dado
            $comments = Comment::where('post_id', $postId)->get();

            return response()->json([
                'comments' => $comments,
                'status' => 200,
            ], 200);

        } catch (\Exception $e) {
            // En caso de error
            return response()->json([
                'message' => 'Error al obtener comentarios',
                'status' => 500,
                'error' => 'Ocurrió un error inesperado al obtener los comentarios.',
            ], 500);
        }
    }

    // Obtener todos los posts con sus comentarios
    public function getAllPostsWithComments()
    {
        try {
            // Recuperar todos los posts con sus comentarios
            $posts = Post::with('comments')->get();

            return response()->json([
                'posts' => $posts,
                'status' => 200,
            ], 200);

        } catch (\Exception $e) {
            // En caso de error
            return response()->json([
                'message' => 'Error al obtener los posts y comentarios',
                'status' => 500,
                'error' => 'Ocurrió un error inesperado al obtener los posts y comentarios.',
            ], 500);
        }
    }
}
