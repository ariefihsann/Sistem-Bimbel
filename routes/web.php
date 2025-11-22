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
Route::view('/CodeC', 'welcome');


// ============================
// DASHBOARD
// ============================
Route::middleware(['auth', 'verified'])
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


// ============================
// ADMIN PANEL
// ============================
Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('students', StudentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('modules', ModuleController::class);
    });


// ============================
// PROGRESS MATERI
// ============================
Route::middleware('auth')
    ->post('/materi/{id}/complete', [MateriController::class, 'complete'])
    ->name('materi.complete');


// ============================
// MODUL & MATERI
// ============================
Route::middleware('auth')
    ->prefix('modul')
    ->group(function () {

        // tampilkan modul + materi pertama
        Route::get('{moduleId}/materi', [MateriController::class, 'index'])
            ->name('materi.index');

        // tampilkan materi tertentu (TETAP ke index agar desain sama)
        Route::get('{moduleId}/materi/{materiId}', [MateriController::class, 'show'])
            ->name('materi.show');
    });


// ============================
// PROFILE
// ============================
Route::middleware('auth')
    ->get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');


require __DIR__ . '/auth.php';
