<?php

use App\Http\Controllers\Auth\InvitationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReclamacionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TrabajosController;
use App\Http\Controllers\UserASDENController;

// Ruta que devuelve la vista 'homepage'
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Ruta para colaboradores
Route::view('/collaborators', '/components/collaborators')->name('collaborators');
Route::view('/ourWork', '/components/ourWork')->name('ourWork');

Route::view('/unsubscribe_success', 'unsubscribe_success')->name('unsubscribe_success');

Route::get('/unsubscribe/{token}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe');

Route::view('/projects', '/components/socialAction/projects')->name('projects');
Route::view('/impData', '/components/socialAction/impData')->name('impData');
Route::view('/subscriptions', '/components/news/subscriptions')->name('subscriptions');
Route::view('/jobBoard', '/components/jobBoard')->name('jobBoard');
Route::view('/humanitarianAid', '/components/socialAction/humanitarianAid')->name('humanitarianAid');
Route::view('/featured', '/components/news/featured')->name('featured');
Route::view('/collaborate', '/components/collaborate')->name('collaborate');

Route::view('/post', '/components/news/blogs')->name('blogs');
// Esta ruta es para mostrar una vista directamente

// GET para mostrar la vista del formulario
Route::get('/libroReclamaciones', function () {
    return view('reclamaciones.libroReclamaciones');
})->name('libroReclamaciones');

// POST para guardar el formulario
Route::post('/libroReclamaciones', [ReclamacionController::class, 'store']);

// EDITAR PERFIL

Route::get('/perfil/editar', [UserASDENController::class, 'editarPerfil'])->name('perfil.editar');
Route::post('/perfil/editar', [UserASDENController::class, 'actualizarPerfil'])->name('perfil.actualizar');


Route::post('/comments/{postId}', [CommentController::class, 'store'])->name('comments.store');

Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');


//trabajos

Route::get('/trabajos/{id}', [TrabajosController::class, 'show'])->name('trabajos.show');


// Suscripciones
Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe');

// perfil
Route::get('/perfil', [UserASDENController::class, 'perfil'])->name('perfil');

// perfilAdmin
Route::get('/perfilAdmin', [UserASDENController::class, 'perfilAdmin'])->name('perfilAdmin');


//Rutas dinamicas
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/post/{id}/{action?}', [PostController::class, 'show']);

Route::get('/noticias/{id}', [NewsController::class, 'show']);
//Route::get('/noticias/{id}/{action?}', [NewsController::class, 'show']);

//mostrar las rutas con el nombre logins
Route::get('/login', function () {
    return view('auth.logins');
})->name('login');

//modal
Route::get('/modalBienvenida/welcome', function () {
    return view('components.modalBienvenida.welcome');
});

// Rutas para procesar invitaciones (verificacion de correos)
Route::get('/invitation/{token}', [InvitationController::class, 'showPasswordSetup'])
    ->middleware(\App\Http\Middleware\CheckInvitationExpiration::class)
    ->name('password.setup');

Route::post('/invitation/{token}', [InvitationController::class, 'processPasswordSetup']);

// Rutas para cambiar password
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])
    ->middleware(\App\Http\Middleware\CheckInvitationExpiration::class)
    ->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'handleReset'])->name('password.update');




// Ruta para el dashboard de administradores.
Route::view('/homeDashboard', 'homeDashboard')->name('homeDashboard');

Route::view('/createpost', 'auth.post')->name('post');
Route::view('/listpost', 'auth.listpost')->name('listpost');

Route::view('/homeDashboard/register', 'auth.register')->name('register');
Route::view('/homeDashboard/listuser', 'auth.listuser')->name('listuser');

Route::view('/homeDashboard/jobs', 'auth.jobs')->name('jobs');
Route::view('/homeDashboard/listjobs', 'auth.listjobs')->name('listjobs');

Route::view('/homeDashboard/projects', 'auth.projects')->name('projectsDashboard');
Route::view('/homeDashboard/listprojects', 'auth.listprojects')->name('listprojects');

Route::view('/homeDashboard/listpostulate', 'auth.listpostulate')->name('listPostulate');

Route::view('/homeDashboard/news', 'auth.news')->name('news');
Route::view('/homeDashboard/listnews', 'auth.listnews')->name('listnews');

Route::view('/homeDashboard/listreclamos', 'auth.listReclamos')->name('listReclamos');

// Route::middleware('auth')->group(function () {
//     Route::get('/email/verify', [VerificationController::class, 'notice'])
//         ->name('verification.notice');

//     Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
//         ->middleware(['auth', 'signed'])
//         ->name('verification.verify');

//     Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
//         ->middleware(['auth', 'throttle:6,1'])
//         ->name('verification.send');


// });



require __DIR__ . '/auth.php';
