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
        $materis = $module->materi()->orderBy('order')->get();

        $totalMateri = $materis->count();

        $completedCount = MateriUser::where('user_id', auth()->id())
            ->whereIn('materi_id', $materis->pluck('id'))
            ->count();

        $progress = $totalMateri > 0
            ? round(($completedCount / $totalMateri) * 100)
            : 0;

        $activeMateri = $materis->first();

        return view('materi.index', compact(
            'module',
            'modules',
            'materis',
            'activeMateri',
            'totalMateri',
            'completedCount',
            'progress'
        ));
    }


    public function show($moduleId, $materiId)
    {
        $modules = Module::all();
        $module = Module::findOrFail($moduleId);
        $materi = Materi::findOrFail($materiId);

        return view('materi.show', compact(
            'module',
            'modules',
            'materi'
        ));
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
