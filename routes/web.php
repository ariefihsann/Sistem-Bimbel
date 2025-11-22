<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MateriController;


// ============================
// WELCOME PAGE
// ============================
Route::get('/CodeC', function () {
    return view('welcome');
});

// ============================
// DASHBOARD
// ============================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ============================
// ADMIN PANEL (ROLE USER DLL)
// ============================
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('modules', ModuleController::class);
});

// ============================
// PROGRESS MATERI
// ============================
Route::middleware('auth')->post('/materi/{id}/complete', [MateriController::class, 'complete'])
    ->name('materi.complete');

// ============================
// ROUTE MODUL & MATERI (YANG KAMU GUNAKAN)
// ============================
Route::prefix('modul')->group(function () {

    // daftar materi per modul
    Route::get('{moduleId}/materi', [MateriController::class, 'index'])
        ->name('materi.index');

    // detail materi
    Route::get('{moduleId}/materi/{materiId}', [MateriController::class, 'show'])
        ->name('materi.show');
});


require __DIR__ . '/auth.php';
