<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Materi;
use App\Models\UserMateriProgress;
use App\Models\MateriUser;

class MateriController extends Controller
{
    public function index($moduleId)
    {
        $module = Module::findOrFail($moduleId);

        $modules = Module::orderBy('order')->get(); // untuk sidebar
        $materis = $module->materi()->orderBy('order')->get(); // materi sesuai modul

        $totalMateri = $materis->count();

        $completedCount = MateriUser::where('user_id', auth()->id())
            ->whereIn('materi_id', $materis->pluck('id'))
            ->count();

        $progress = $totalMateri > 0 ? round(($completedCount / $totalMateri) * 100) : 0;

        return view('materi.index', compact(
            'module',
            'modules',
            'materis',
            'totalMateri',
            'completedCount',
            'progress'
        ));
    }


    public function show($moduleId, $materiId)
    {
        $module = Module::with('materi')->findOrFail($moduleId);
        $modules = Module::all();
        $materi = Materi::where('module_id', $moduleId)->findOrFail($materiId);

        return view('modules.show', compact(
            'module',
            'modules',
            'materi'
        ));
    }


    public function complete($id)
    {
        UserMateriProgress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'materi_id' => $id
            ],
            [
                'is_completed' => true
            ]
        );

        return back()->with('success', 'Materi telah ditandai selesai!');
    }
}
