<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;

Route::get('/', [DashboardController::class, 'home']);

Route::get(
    'register',
    [FormController::class, 'daftar']
);

Route::post(
    'welcome',
    [FormController::class, 'welcome']
);


// CRUD Genre

// // Create
Route::get('/genre/create', [GenreController::class, 'create']);
// Route::post('/genre', [GenreController::class, 'store']);

// Read
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

// CRUD Books
Route::resource('books', BooksController::class);


Route::middleware(['auth', isAdmin::class])->group(function () {
    // Create
    Route::get('/genre/create', [GenreController::class, 'create']);
    Route::post('/genre', [GenreController::class, 'store']);

    // Update
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
    Route::put('/genre/{id}', [GenreController::class, 'update']);

    // Delete
    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

});

// Auth, Register, Login
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Profile
Route::get('/profile', [AuthController::class, 'getProfile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createProfile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth');