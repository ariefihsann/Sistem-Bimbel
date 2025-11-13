<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Course; // <-- Panggil Course
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Tampilkan daftar Modul.
     */
    public function index()
    {
        $modules = Module::with('course')->get(); // Ambil relasi course-nya
        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Tampilkan formulir tambah Modul.
     */
    public function create()
    {
        // Kirim daftar Kursus untuk dropdown
        $courses = Course::all();
        return view('admin.modules.create', compact('courses'));
    }

    /**
     * Simpan Modul baru.
     */
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

    /**
     * Tampilkan detail Modul (Siswa akan pakai ini)
     */
    public function show(Module $module)
    {
        // Ini untuk halaman baca modul oleh siswa
        return view('student.modules.show', compact('module'));
    }

    /**
     * Tampilkan formulir edit Modul.
     */
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

    /**
     * Hapus Modul.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Modul berhasil dihapus.');
    }
}