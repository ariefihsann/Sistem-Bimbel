<?php



namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil semua module + jumlah materi
        $modules = Module::withCount('materi')->get()
            ->map(function ($module) use ($user) {

                // Hitung materi yang sudah selesai (pivot module_user)
                $completed = $user->modules()
                    ->where('module_id', $module->id)
                    ->wherePivot('status', 1)
                    ->count();

                $progress = $module->materi_count > 0
                    ? round(($completed / $module->materi_count) * 100)
                    : 0;

                $module->progress = $progress;

                return $module;
            });

        return view('layouts.admin', compact('modules'));
    }
}
