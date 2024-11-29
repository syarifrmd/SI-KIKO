<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerawatController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Perawat Routes
Route::middleware(['auth', 'role:perawat'])->group(function () {
    Route::get('/perawat/dashboard', [PerawatController::class, 'index'])->name('perawat.dashboard');
});

// Route::middleware(['guest.register'])->group(function () {
//     Route::get('/register', [LoginController::class, 'register'])->name('register'); // Halaman register
//     Route::post('/register', [LoginController::class, 'create'])->name('create'); // Proses register
// });

Route::get('/register', [LoginController::class, 'register'])->name('register'); // Halaman register
Route::post('/register', [LoginController::class, 'create'])->name('create'); 

// Halaman Home
Route::get('/', function () {
    return view('welcome');
});
