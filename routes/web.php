<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    // Ini akan memuat file: resources/views/dashboard.blade.php
    return view('dashboard');
});
