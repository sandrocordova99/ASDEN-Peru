<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserASDENController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReclamacionController;
use App\Http\Controllers\SubscriberController;

//Varios se pueden postular a varios trabajos (Limite -> vacantes , si se excede se cierra) ?¿ 

// Rutas públicas (sin protección JWT)

Route::post('/crearContactos', [ContactoController::class, 'store']); //publico -> confirmacion a correo ¿?

// Trabajo
Route::get('/getAllWorks', [JobController::class, 'getAllWorks']);

// Solicitudes
Route::post('/solicitarTrabajo/{id}', [SolicitudController::class, 'store']);
Route::get('/conseguirSolicitud', [SolicitudController::class, 'getAllSocilicitudes']);


// Usuarios
// Blogs
Route::get('/getAllBlogs', [PostController::class, 'getAllPostsUser']);
Route::get('/getPostsByTag/{tag?}', [PostController::class, 'getPostsByTag']);

// Comentarios
Route::get('/listarComentarios', [CommentController::class, 'getAllPostsWithComments']); //listar todos los post con los comentarios
Route::post('/createComentario/{postId}', [CommentController::class, 'store']);  //usuario 
Route::get('/listarPostUsuario', [PostController::class, 'getAllPostsUser']);

// Contactos
Route::get('/conseguirContactos', [ContactoController::class, 'getAllContactos']); //Solo administrador

// Noticias
Route::post('/crearNoticias', [NoticiasController::class, 'store']); //administrador
Route::get('/getAllNoticias', [NewsController::class, 'getAllNoticias']);



// Reclamos
Route::get('/getAll', [ReclamacionController::class, 'getAll']);

Route::post('/libroReclamaciones', [ReclamacionController::class, 'store'])->name('store');

//Proyectos
Route::get('/getAllProjects', [ProjectsController::class, 'index']);

// En teoria para descargar el CV (aún no se implementa)
//Route::get('/descargarCV/{nombreArchivo}', [SolicitudController::class, 'descargarCV']);

Route::post('/login', [AuthController::class, 'login'])->name('api.login');


// Rutas habilitadas para admins
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/admin-info', [UserASDENController::class, 'getAdminInfo']);

    //actualizar perfil
    Route::post('/updateProfile', [UserASDENController::class, 'updateProfile']);


    Route::get('/getAllPostById', [PostController::class, 'getAllPostById']);

    Route::get('/getAuthenticatedUser', [AuthController::class, 'getAuthenticatedUser']);

    Route::get('/getUser/{id}', [UserASDENController::class, 'getUser']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

    Route::post('/register', [UserASDENController::class, 'register']);

    Route::get('/getAllSubs', [SubscriberController::class, 'getAllSubscribers']);
    Route::get('/conseguirUser', [UserASDENController::class, 'getAllUsers']);
    Route::delete('/destroy/{id}', [UserASDENController::class, 'destroy']);
    Route::put('/update/{id}', [UserASDENController::class, 'update']);

    //Trabajos
    Route::post('/jobs', [JobController::class, 'jobs']);
    Route::delete('/destroyJobs/{id}', [JobController::class, 'destroyJobs']);
    Route::get('/getJob/{id}', [JobController::class, 'getJob']);
    Route::put('/updateJob/{id}', [JobController::class, 'updateJob']);

    //Solicitudes
    Route::patch('updateSolicitud/{id}', [SolicitudController::class, 'update']);
    Route::delete('deleteSolicitud/{id}', [SolicitudController::class, 'destroy']);

    //Noticias
    Route::get('/getAllNoticiasById', [NewsController::class, 'getAllNoticiasById']);
    Route::post('/news', [NewsController::class, 'news']);
    Route::put('/actualizarNoticia/{id}', [NewsController::class, 'updateNoticia']);
    Route::get('/getNoticia/{id}', [NewsController::class, 'getNoticia']);
    Route::delete('/destroyNews/{id}', [NewsController::class, 'destroyNews']);

    // Blogs
    Route::put('/updatePost/{id}', [PostController::class, 'updatePost']);
    Route::get('/getPost/{id}', [PostController::class, 'getPost']);
    Route::delete('/eliminarPost/{id}', [PostController::class, 'destroy']);
    Route::get('/getAllBlogsById', [PostController::class, 'getAllPostById']);

    Route::post('/editarPost/{id}', [PostController::class, 'edit']);
    Route::post('/createPost', [PostController::class, 'posts']);  //usuario 

    Route::put('/actualizarNoticia/{id}', [NewsController::class, 'updateNoticia']);

    // Proyectos
    Route::post('/projects', [ProjectsController::class, 'store']);
    Route::patch('/updateProject/{id}', [ProjectsController::class, 'update']);
    Route::get('/getProject/{id}', [ProjectsController::class, 'show']);
    Route::delete('/destroyProject/{id}', [ProjectsController::class, 'destroy']);

    // Reclamos
    Route::put('/reclamaciones/{id}/cambiar-estado', [ReclamacionController::class, 'cambiarEstado']);
});
