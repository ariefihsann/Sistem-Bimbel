<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Penting untuk enkripsi password

class UserController extends Controller
{
    /**
     * Tampilkan daftar User.
     */
    public function index()
    {
        // Ambil users, dan ambil juga relasi 'role'-nya agar efisien
        $users = User::with('role')->get(); 
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Tampilkan formulir tambah User.
     */
    public function create()
    {
        // Kita butuh daftar Role (Admin/Siswa) untuk ditampilkan di dropdown
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Simpan User baru.
     */
    public function store(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id' // Pastikan role_id ada di tabel roles
        ]);

        // 2. Buat data user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // WAJIB: Enkripsi password
            'role_id' => $request->role_id
        ]);

        // 3. Redirect
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail User (Bisa dilewati)
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Tampilkan formulir edit User.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User.
     */
    public function update(Request $request, User $user)
    {
        // 1. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id'
            // Password tidak wajib di-update
        ]);

        // 2. Update data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id
        ]);

        // 3. Jika user mengisi password baru, update passwordnya
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        // 4. Redirect
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus User.
     */
    public function destroy(User $user)
    {
        // Tambahkan proteksi agar tidak bisa hapus diri sendiri (opsional)
        if ($user->id == auth()->id()) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}