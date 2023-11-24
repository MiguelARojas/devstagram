<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

// ROUTES PARA REGISTRAR
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// ROTES PARA LOGOUT
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// ROUTES PARA LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

// ROUTES PARA POSTS
Route::get('/photos/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// DE ESTA MANERA MANTENEMOS UNA VARIABLE EN LA URL PARA MOSTRAR EL USERNAME
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');