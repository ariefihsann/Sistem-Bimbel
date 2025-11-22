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

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');


Route::get('/modules/{module}/materi', [MateriController::class, 'index'])
    ->name('modules.materi');

Route::get('/modules/{module}', [MateriController::class, 'index'])->name('modules.show');


Route::get('/modul/{moduleId}/materi', [MateriController::class, 'index'])
    ->name('materi.index');

Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
Route::get('/modules/{module}/materi/{materi}', [MateriController::class, 'show'])->name('materi.show');


// HALAMAN WELCOME
Route::get('/CodeC', function () {
    return view('welcome');
});

// HALAMAN MODULE DETAIL
Route::get('/modules/{id}', [ModuleController::class, 'show'])
    ->name('modules.show');

Route::get('/modules/{moduleId}/materi/{materiId}', [MateriController::class, 'show'])
    ->name('materi.show');

Route::get('/modul/{moduleId}/materi', [MateriController::class, 'index'])->name('materi.index');
Route::get('/modul/{moduleId}/materi/{materiId}', [MateriController::class, 'show'])->name('materi.show');



Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.show');


// HALAMAN DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// ROUTE UNTUK USER LOGIN
Route::middleware('auth')->group(function () {

    // PROGRESS MATERI (WAJIB LOGIN)
    Route::post('/materi/{id}/complete', [MateriController::class, 'complete'])
        ->name('materi.complete');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ADMIN PANEL
    Route::prefix('admin')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('students', StudentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('modules', ModuleController::class);
    });
});

require __DIR__ . '/auth.php';
