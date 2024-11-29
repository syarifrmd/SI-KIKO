<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerawatController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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
    return view('welcome');
});
