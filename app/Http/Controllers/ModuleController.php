<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Course; // <-- Panggil Course
use Illuminate\Http\Request;
use App\Models\MateriUser;


class ModuleController extends Controller
{
    /**
     * Tampilkan daftar Modul.
     */
    public function index($id)
    {
        $module = Module::with('materis')->findOrFail($id);

        $totalMateri = $module->materis->count();

        $completedCount = MateriUser::where('user_id', auth()->id())
            ->whereIn('materi_id', $module->materis->pluck('id'))
            ->count();

        $progress = $totalMateri > 0
            ? round(($completedCount / $totalMateri) * 100)
            : 0;

        return view('materi.index', compact(
            'module',
            'progress',
            'completedCount',
            'totalMateri'
        ));
    }


    public function create()
    {
        // Kirim daftar Kursus untuk dropdown
        $courses = Course::all();
        return view('admin.modules.create', compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'sequence' => 'required|integer'
        ]);

        Module::create($request->all());

        return redirect()->route('modules.index')->with('success', 'Modul berhasil ditambahkan.');
    }


    public function show($id)
    {
        $module = Module::with('materis')->findOrFail($id);

        return view('modules.show', compact('module'));
    }


    public function edit(Module $module)
    {
        $courses = Course::all();
        return view('admin.modules.edit', compact('module', 'courses'));
    }

    /**
     * Update Modul.
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'sequence' => 'required|integer'
        ]);

        $module->update($request->all());

        return redirect()->route('modules.index')->with('success', 'Modul berhasil diperbarui.');
    }
    public function complete($id)
    {
        $materi_id = $id;

        MateriUser::updateOrCreate(
            ['user_id' => auth()->id(), 'materi_id' => $materi_id],
            ['status' => 'completed', 'completed_at' => now()]
        );


        return back()->with('success', 'Materi telah ditandai selesai!');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Modul berhasil dihapus.');
    }
}
