<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MateriController;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ModuleController as AdminModuleController;
use App\Http\Controllers\Admin\MateriController as AdminMateriController;


Route::view('/CodeC', 'welcome');


Route::middleware(['auth', 'not_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::resource('modules', App\Http\Controllers\Admin\ModuleController::class);
        Route::resource('materi', App\Http\Controllers\Admin\MateriController::class);
    });


Route::middleware('auth')
    ->post('/materi/{id}/complete', [MateriController::class, 'complete'])
    ->name('materi.complete');

Route::middleware('auth')
    ->prefix('modul')
    ->group(function () {

        Route::get('{moduleId}/materi', [MateriController::class, 'index'])
            ->name('materi.index');

        Route::get('{moduleId}/materi/{materiId}', [MateriController::class, 'show'])
            ->name('materi.show');
    });

Route::middleware('auth')->get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

require __DIR__ . '/auth.php';
