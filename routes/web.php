<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerawatController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Role Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Perawat Routes
    Route::get('admin/perawat', [AdminController::class, 'managePerawat'])->name('admin.perawat.index');
    Route::get('admin/perawat/create', [AdminController::class, 'createPerawat'])->name('admin.perawat.create');
    Route::post('admin/perawat/store', [AdminController::class, 'storePerawat'])->name('admin.perawat.store');
    Route::get('admin/perawat/{perawat}/edit', [AdminController::class, 'editPerawat'])->name('admin.perawat.edit');
    Route::put('admin/perawat/{perawat}', [AdminController::class, 'updatePerawat'])->name('admin.perawat.update');
    Route::delete('admin/perawat/{perawat}', [AdminController::class, 'destroyPerawat'])->name('admin.perawat.destroy');

    // Pasien Routes
    Route::get('admin/patients', [AdminController::class, 'managePatients'])->name('admin.patients.index');
    Route::get('admin/patients/create', [AdminController::class, 'createPatient'])->name('admin.patients.create');
    Route::post('admin/patients', [AdminController::class, 'storePatient'])->name('admin.patients.store');
    Route::get('admin/patients/{pasien}/edit', [AdminController::class, 'editPatient'])->name('admin.patients.edit');
    Route::put('admin/patients/{pasien}', [AdminController::class, 'updatePatient'])->name('admin.patients.update');
    Route::delete('admin/patients/{pasien}', [AdminController::class, 'destroyPatient'])->name('admin.patients.destroy');

    // Rekam Medis Routes
    Route::get('admin/medical-records', [AdminController::class, 'manageMedicalRecords'])->name('admin.medical_records.index');
    Route::get('admin/medical-records/create', [AdminController::class, 'createMedicalRecord'])->name('admin.medical_records.create');
    Route::post('admin/medical-records', [AdminController::class, 'storeMedicalRecord'])->name('admin.medical_records.store');
    Route::get('admin/medical-records/{rekamMedis}/edit', [AdminController::class, 'editMedicalRecord'])->name('admin.medical_records.edit');
    Route::put('admin/medical-records/{rekamMedis}', [AdminController::class, 'updateMedicalRecord'])->name('admin.medical_records.update');
    Route::delete('admin/medical-records/{rekamMedis}', [AdminController::class, 'destroyMedicalRecord'])->name('admin.medical_records.destroy');
});

//Role Perawat

Route::middleware(['auth', 'role:perawat'])->group(function () {
    Route::get('perawat/dashboard', [PerawatController::class, 'index'])->name('perawat.dashboard');

    //Route Pasien
    Route::get('perawat/patients', [PerawatController::class, 'managePatients'])->name('perawat.patients.index');
    Route::get('perawat/patients/create', [PerawatController::class, 'createPatient'])->name('perawat.patients.create');
    Route::post('perawat/patients', [PerawatController::class,'storePatient'])->name('perawat.patients.store');
    Route::get('perawat/patients/{pasien}/edit', [PerawatController::class, 'editPatient'])->name('perawat.patients.edit');
    Route::put('perawat/patients/{pasien}', [PerawatController::class, 'updatePatient'])->name('perawat.patients.update');
    Route::delete('perawat/patients/{pasien}', [PerawatController::class, 'destroyPatient'])->name('perawat.patients.destroy');
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
