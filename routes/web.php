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


Route::get('/CodeC', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // Rute Profil (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('students', StudentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('modules', ModuleController::class);
    }); // Akhir dari grup /admin

}); // Akhir dari grup 'auth'


// Rute Autentikasi (Bawaan Breeze)
require __DIR__ . '/auth.php';
