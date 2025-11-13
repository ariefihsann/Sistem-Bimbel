<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    // Ini akan memuat file: resources/views/dashboard.blade.php
    return view('dashboard');
});

Route::get('/dashboard', function () {
    // Ini akan memuat file: resources/views/welcome.blade.php
    return view('welcome');
});
