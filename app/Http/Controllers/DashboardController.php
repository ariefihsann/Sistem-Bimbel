<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Materi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();

    // Ambil module + jumlah materi
    $modules = Module::with('materis')->get();

    foreach ($modules as $module) {

        $total = $module->materis->count();

        // Hitung total materi yang sudah dipelajari user dari tabel materi_user
        $completed = \DB::table('materi_user')
            ->where('user_id', $user->id)
            ->whereIn('materi_id', $module->materis->pluck('id'))
            ->count();

        // hitung persen
        $module->progress_percentage = $total > 0
            ? round(($completed / $total) * 100)
            : 0;

        // status
        if ($completed == 0) {
            $module->status_text = "Belum dimulai";
        } elseif ($completed < $total) {
            $module->status_text = "Sedang berjalan";
        } else {
            $module->status_text = "Selesai";
        }

        // tampilkan x/y
        $module->completed_text = "$completed / $total";
    }

    return view('dashboard', compact('modules'));
}


    public function admin()
{
    return view('admin.dashboard', [
        'totalUsers'   => User::count(),
        'totalModules' => Module::count(),
        'totalMateri'  => Materi::count(),
        'modules'      => Module::all()
    ]);
}

}