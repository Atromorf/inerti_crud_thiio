<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
    /*     return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]); */
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    // aqui van las rutas

    // devuelve la vista de TODOS los post
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    // vista para el formulario para crear un nuevo post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    // guarda el post en la base de datos
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    // muestra el formulario con el post seleccionado para editar
    Route::get('/posts/{post}/edit', [PostController::class, 'show'])->name('posts.show');

    // funcion para actualizar el post
    Route::post('/posts/update', [PostController::class, 'update'])->name('posts.update');
    //Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');


    // funcion para eliminar el post
    Route::get('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');

    // ruta para vista estadistica
    Route::get('/stats', [PostController::class, 'estadisticas'])->name('posts.estadisticas');
    

});
