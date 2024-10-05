<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\InicioController;

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

Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

//Rutas para el dashboard del admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
});

require __DIR__.'/auth.php';
