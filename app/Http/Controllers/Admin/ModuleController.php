<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::orderBy('order')->get();
        return view('admin.modules.index', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'order'       => 'required|integer|min:1',
            'image'       => 'nullable|image|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('modules', 'public');
        }

        Module::create([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'image'       => $imagePath
        ]);

        return redirect()->route('admin.modules.index')->with('success', 'Module berhasil ditambahkan');
    }

    public function update(Request $request, Module $module)
    {

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'order'       => 'required|integer|min:1',
            'image'       => 'nullable|image|max:2048'
        ]);

        $imagePath = $module->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('modules', 'public');
        }

        $module->update([
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order,
            'image'       => $imagePath
        ]);

        return redirect()->route('admin.modules.index')->with('success', 'Module berhasil diperbarui');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('admin.modules.index')->with('success', 'Module berhasil dihapus');
    }
}
