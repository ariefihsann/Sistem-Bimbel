<?php

use Illuminate\Support\Facades\Route;
// Controller bawaan Breeze (Biarkan saja)
use App\Http\Controllers\ProfileController;

// Controller yang BARU dibuat (Tambahkan 5 baris ini)
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;

// Rute Halaman Depan
Route::get('/CodeC', function () {
    return view('welcome');
});

// Rute Dashboard (Sudah diperbaiki, mengarah ke view 'dashboard' BUKAN 'welcome')
Route::get('/dashboard', function () {
    return view('layouts.admin'); // <-- Ini mengarah ke dashboard.blade.php
})->middleware(['auth', 'verified'])->name('dashboard'); // <-- Ini nama rute yang benar

// Rute Grup yang dilindungi (Hanya bisa diakses setelah login)
Route::middleware('auth')->group(function () {

    // Rute Profil (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | RUTE ADMIN (5 RESOURCE CONTROLLER)
    |--------------------------------------------------------------------------
    */
    // Kita buat grup baru untuk /admin agar URL rapi (contoh: .../admin/roles)
    // 'prefix' akan menambahkan /admin di depan semua URL
    Route::prefix('admin')->group(function () {

        // Ini mendaftarkan 5 Resource Controller Anda
        // Ini akan membuat rute seperti:
        // /admin/roles
        // /admin/users
        // /admin/students
        // /admin/courses
        // /admin/modules
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('students', StudentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('modules', ModuleController::class);
    }); // Akhir dari grup /admin

}); // Akhir dari grup 'auth'


// Rute Autentikasi (Bawaan Breeze)
require __DIR__ . '/auth.php';
