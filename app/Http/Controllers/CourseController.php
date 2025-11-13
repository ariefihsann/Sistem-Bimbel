<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Tampilkan daftar Kursus.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Tampilkan formulir tambah Kursus.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Simpan Kursus baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail Kursus (Bisa dilewati)
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Tampilkan formulir edit Kursus.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update Kursus.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    /**
     * Hapus Kursus.
     */
    public function destroy(Course $course)
    {
        // Hati-hati: Jika kursus ini punya modul, mungkin akan error (Foreign Key constraint)
        // Kita bisa tambahkan logika: "Hapus semua modulnya dulu, baru hapus kursusnya"
        // $course->modules()->delete(); // Hapus semua modul di dalam kursus ini
        
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Kursus berhasil dihapus.');
    }
}