<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // <-- Penting untuk Transaction

class StudentController extends Controller
{
    /**
     * Tampilkan daftar Siswa.
     */
    public function index()
    {
        // Ambil biodata siswa, beserta data login (User) dan role-nya
        $students = Student::with('user.role')->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Tampilkan formulir tambah Siswa.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Simpan Siswa baru.
     * Ini rumit: kita harus buat 2 record (di tabel users dan students)
     */
    public function store(Request $request)
    {
        // 1. Validasi (Gabungan data User dan Student)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'nis' => 'required|string|unique:students,nis',
            'address' => 'nullable|string',
            'birth_date' => 'nullable|date',
        ]);

        // 2. Gunakan DB Transaction (Agar data aman)
        // Jika gagal buat Student, data User akan di-rollback (dibatalkan)
        try {
            DB::transaction(function () use ($request) {
                // 3. Buat data di tabel 'users' dulu
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role_id' => 2 // Asumsi ID 2 adalah "Siswa" (Hardcode)
                ]);

                // 4. Buat data di tabel 'students' menggunakan ID user baru
                $user->student()->create([ // <-- Ini menggunakan relasi hasOne()
                    'nis' => $request->nis,
                    'address' => $request->address,
                    'birth_date' => $request->birth_date
                ]);
            });
        } catch (\Exception $e) {
            // Jika terjadi error, kembali dengan pesan error
            return back()->with('error', 'Gagal menyimpan data siswa: ' . $e->getMessage());
        }

        // 5. Redirect
        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail Siswa (Bisa dilewati)
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Tampilkan formulir edit Siswa.
     */
    public function edit(Student $student)
    {
        // Load relasi user-nya
        $student->load('user');
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update Siswa.
     */
    public function update(Request $request, Student $student)
    {
        // 1. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'nis' => 'required|string|unique:students,nis,' . $student->id,
            'address' => 'nullable|string',
            'birth_date' => 'nullable|date',
        ]);
        
        try {
            DB::transaction(function () use ($request, $student) {
                // 1. Update tabel 'users'
                $student->user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                // 2. Jika password diisi, update password
                if ($request->filled('password')) {
                    $student->user->update([
                        'password' => Hash::make($request->password)
                    ]);
                }

                // 3. Update tabel 'students'
                $student->update([
                    'nis' => $request->nis,
                    'address' => $request->address,
                    'birth_date' => $request->birth_date
                ]);
            });
        } catch (\Exception $e) {
             return back()->with('error', 'Gagal memperbarui data siswa: ' . $e->getMessage());
        }

        return redirect()->route('students.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Hapus Siswa (dan akun User-nya).
     */
    public function destroy(Student $student)
    {
        try {
             DB::transaction(function () use ($student) {
                // Hapus data student dulu (karena ada FK)
                $student->delete();
                // Hapus data user-nya
                $student->user->delete();
             });
        } catch (\Exception $e) {
             return back()->with('error', 'Gagal menghapus data siswa: ' . $e->getMessage());
        }
        
        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus.');
    }
}