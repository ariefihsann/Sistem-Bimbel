<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ModuleController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ModuleController as AdminModuleController;
use App\Http\Controllers\Admin\MateriController as AdminMateriController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGE
|--------------------------------------------------------------------------
*/

Route::view('/CodeC', 'welcome');

/*
|--------------------------------------------------------------------------
| USER DASHBOARD (SISWA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->name('admin.')       // ← WAJIB! AGAR route('admin.xxx') bisa dipakai
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard');

        // User CRUD
        Route::resource('users', AdminUserController::class);

        // Module CRUD
        Route::resource('modules', AdminModuleController::class);

        // Materi CRUD
        Route::resource('materi', AdminMateriController::class);
    });



/*
|--------------------------------------------------------------------------
| PROGRESS MATERI (SISWA)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->post('/materi/{id}/complete', [
    MateriController::class,
    'complete'
])->name('materi.complete');

/*
|--------------------------------------------------------------------------
| MODUL & MATERI (SISWA)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('modul')
    ->group(function () {

        // index modul → tampilkan materi pertama
        Route::get('{moduleId}/materi', [MateriController::class, 'index'])
            ->name('materi.index');

        // tampilkan materi tertentu
        Route::get('{moduleId}/materi/{materiId}', [MateriController::class, 'show'])
            ->name('materi.show');
    });

/*
|--------------------------------------------------------------------------
| PROFILE (DEFAULT LARAVEL)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/profile', [
    ProfileController::class,
    'edit'
])->name('profile.edit');

require __DIR__ . '/auth.php';
