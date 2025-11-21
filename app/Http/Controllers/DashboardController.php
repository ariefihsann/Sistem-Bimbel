<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil semua module + hitung jumlah materi
        $modules = Module::withCount('materi')->get();

        foreach ($modules as $module) {
            // total materi
            $total = $module->materi_count;

            // jumlah materi yang sudah dikerjakan user
            $completed = $user->modules()
                ->where('module_id', $module->id)
                ->wherePivot('status', 1)
                ->count();

            // persentase
            $module->progress_percentage = $total > 0 ? round(($completed / $total) * 100) : 0;

            // status text
            if ($completed == 0) {
                $module->status_text = "Belum dimulai";
            } elseif ($completed < $total) {
                $module->status_text = "Sedang berjalan";
            } else {
                $module->status_text = "Selesai";
            }

            // tampilkan format "x/y"
            $module->completed_text = "$completed / $total";
        }

        return view('layouts.admin', compact('modules'));
    }
}