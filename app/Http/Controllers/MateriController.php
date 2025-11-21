<?php

namespace App\Http\Controllers;

use App\Models\Module;

class MateriController extends Controller
{
    public function index($moduleId)
    {
        $module = Module::findOrFail($moduleId);

        // ambil semua materi yang terkait module ini
        $materi = $module->materi; // relasi hasMany

        return view('materi.index', compact('module', 'materi'));
    }
}
