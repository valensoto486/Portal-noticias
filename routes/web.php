<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('index');
});

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

require __DIR__.'/auth.php';
