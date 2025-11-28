<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Materi;
use App\Models\MateriUser;

class MateriController extends Controller
{
   
    public function index($moduleId)
    {
        $module    = Module::findOrFail($moduleId);
        $modules   = Module::orderBy('order')->get();
        $materis   = $module->materis()->orderBy('order')->get();

        $user = auth()->user();

        $totalMateri = $materis->count();
        $completedCount = $user->completedMateri()
            ->whereIn('materi_id', $materis->pluck('id'))
            ->count();

        $progress = $totalMateri > 0
            ? round(($completedCount / $totalMateri) * 100)
            : 0;

        // Materi pertama
        $activeMateri = $materis->first();

        // Previous dan next (materi pertama -> previous null)
        $previousMateri = null;
        $nextMateri = $materis->skip(1)->first();

        return view('materi.index', compact(
            'module',
            'modules',
            'materis',
            'activeMateri',
            'totalMateri',
            'completedCount',
            'progress',
            'previousMateri',
            'nextMateri'
        ));
    }

    public function show($moduleId, $materiId)
    {
        $module    = Module::findOrFail($moduleId);
        $modules   = Module::orderBy('order')->get();
        $materis   = $module->materis()->orderBy('order')->get();

        // Materi aktif
        $activeMateri = Materi::where('module_id', $moduleId)
            ->where('id', $materiId)
            ->firstOrFail();

        // Tandai progress selesai
        MateriUser::firstOrCreate([
            'user_id'   => auth()->id(),
            'materi_id' => $activeMateri->id,
        ]);

        // Hitung ulang progress
        $totalMateri = $materis->count();
        $completedCount = auth()->user()->completedMateri()
            ->whereIn('materi_id', $materis->pluck('id'))
            ->count();

        $progress = $totalMateri > 0
            ? round(($completedCount / $totalMateri) * 100)
            : 0;

        // Previous & Next
        $previousMateri = Materi::where('module_id', $moduleId)
            ->where('order', '<', $activeMateri->order)
            ->orderBy('order', 'desc')
            ->first();

        $nextMateri = Materi::where('module_id', $moduleId)
            ->where('order', '>', $activeMateri->order)
            ->orderBy('order')
            ->first();

        return view('materi.index', compact(
            'module',
            'modules',
            'materis',
            'activeMateri',
            'totalMateri',
            'completedCount',
            'progress',
            'previousMateri',
            'nextMateri'
        ));
    }

    public function complete($id)
    {
        MateriUser::updateOrCreate(
            [
                'user_id'   => auth()->id(),
                'materi_id' => $id
            ],
            [
                'status'        => 'completed',
                'completed_at'  => now(),
            ]
        );

        return back()->with('success', 'Materi selesai!');
    }
}