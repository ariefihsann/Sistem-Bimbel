<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function __construct()
    {
        // Initialization code can go here if needed
        app('log')->info('Controller initialized: ' . static::class);
    }
}
