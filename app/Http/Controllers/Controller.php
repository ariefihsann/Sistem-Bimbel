<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function __construct()
    {
        app('log')->info('Controller initialized: ' . static::class);
    }
}
