<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\InicioController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Muestra el login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

//Envia los datos del login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

//Muestra el registro
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

//Envia
Route::post('/register', [RegisteredUserController::class, 'store']);

//RUTAS DE MIS PAGINAS
Route::get('/', [InicioController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Ruta para el foro con filtros
Route::get('/forum', [ForumController::class, 'index'])->name('forum');

// Ruta para mostrar una noticia específica en el foro
Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

//Ruta Comentarios
Route::post('/forum/{forum}/comments', [CommentController::class, 'store'])->name('comments.store');

//Rutas para el dashboard del admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');

    // Rutas para editar y eliminar usuarios
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.destroy');

    // Rutas para editar y eliminar contenido
    Route::get('/admin/content/{forum}/edit', [AdminController::class, 'editContent'])->name('admin.content.edit');
    Route::delete('/admin/content/{forum}', [AdminController::class, 'deleteContent'])->name('admin.content.destroy');

    Route::put('/admin/content/{forum}', [AdminController::class, 'updateContent'])->name('admin.content.update');

    Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.comments.index');
    Route::get('/admin/comments/{comment}/edit', [CommentController::class, 'edit'])->name('admin.comments.edit');
    Route::put('/admin/comments/{comment}', [CommentController::class, 'update'])->name('admin.comments.update');
    Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');
    
});
    
    Route::middleware(['auth', 'permission:view-posts'])->group(function () {
        
    });

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
    
});

require __DIR__.'/auth.php';
