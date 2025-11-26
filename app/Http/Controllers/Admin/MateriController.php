<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Tampilkan semua materi (opsional, bisa dipakai di halaman admin sendiri).
     */
    public function index()
    {
        $materis = Materi::with('module')
            ->orderBy('module_id')
            ->orderBy('order')
            ->get();

        return view('admin.materi.index', compact('materis')); // kalau mau dipakai
    }

    /**
     * Tidak wajib dipakai karena form create kita taruh di halaman materi siswa.
     */
    public function create()
    {
        //
    }

    /**
     * Simpan materi baru (dipanggil dari form di bawah daftar materi).
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file'      => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx',
            'order'     => 'nullable|integer',
        ]);
    

        // Upload file (opsional)
        if ($request->hasFile('file')) {
            // akan tersimpan di storage/app/public/materi
            $data['file'] = $request->file('file')->store('materi', 'public');
        }

        // Kalau order kosong, isi otomatis di urutan terakhir modul tersebut
        if (empty($data['order'])) {
            $maxOrder = Materi::where('module_id', $data['module_id'])->max('order');
            $data['order'] = $maxOrder ? $maxOrder + 1 : 1;
        }

        Materi::create($data);

        // Balik lagi ke halaman modul/materi siswa
        return redirect()
    ->route('materi.show', ['moduleId' => $data['module_id'], 'materiId' => Materi::max('id')])
    ->with('success', 'Materi berhasil ditambahkan.');

    }

    /**
     * Show tidak dipakai.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Edit/Update kalau nanti mau dipakai bisa disiapkan.
     */
    public function edit(Materi $materi)
    {
        //
    }

    public function update(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Hapus materi.
     */
    public function destroy(Materi $materi)
    {
        $moduleId = $materi->module_id;

        // Hapus file kalau ada
        if ($materi->file) {
            Storage::disk('public')->delete($materi->file);
        }

        $materi->delete();

        return redirect()
            ->route('materi.index', $moduleId)
            ->with('success', 'Materi berhasil dihapus.');
    }
}