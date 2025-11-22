<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Materi;
use App\Models\MateriUser;

class MateriController extends Controller
{
    public function index($moduleId)
    {
        $module = Module::findOrFail($moduleId);
        $modules = Module::orderBy('order')->get();
        $materis = Materi::where('module_id', $moduleId)
            ->orderBy('order')
            ->get();

        $user = auth()->user();

        $totalMateri = $materis->count();
        $completedCount = $user->completedMateri()
            ->whereIn('materi_id', $materis->pluck('id'))
            ->count();

        $progress = $totalMateri > 0
            ? round(($completedCount / $totalMateri) * 100)
            : 0;

        // ambil materi pertama untuk ditampilkan
        $activeMateri = $materis->first();

        return view('materi.index', [
            'module' => $module,
            'modules' => $modules,
            'materis' => $materis,
            'activeMateri' => $activeMateri,
            'totalMateri' => $totalMateri,
            'completedCount' => $completedCount,
            'progress' => $progress
        ]);
    }



    public function show($moduleId, $materiId)
    {
        $module = Module::findOrFail($moduleId);
        $modules = Module::orderBy('order')->get();

        // Semua materi dalam modul ini
        $materis = Materi::where('module_id', $moduleId)
            ->orderBy('order')
            ->get();

        // Materi yang sedang dibuka
        $materi = Materi::findOrFail($materiId);

        // Hitung progress lagi (agar sama dengan index)
        $user = auth()->user();

        $totalMateri = $materis->count();
        $completedCount = $user->completedMateri()
            ->whereIn('materi_id', $materis->pluck('id'))
            ->count();

        $progress = $totalMateri > 0
            ? round(($completedCount / $totalMateri) * 100)
            : 0;

        return view('materi.index', [
            'module' => $module,
            'modules' => $modules,
            'materis' => $materis,
            'activeMateri' => $materi,   // gunakan ini di view
            'totalMateri' => $totalMateri,
            'completedCount' => $completedCount,
            'progress' => $progress
        ]);
    }



    public function complete($id)
    {
        MateriUser::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'materi_id' => $id
            ],
            [
                'status' => 'completed',
                'completed_at' => now(),
            ]
        );

        return back()->with('success', 'Materi selesai!');
    }
}
