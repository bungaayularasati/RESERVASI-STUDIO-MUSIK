<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Studio;

class StudioController extends Controller
{
    public function index()
    {
        $studio = Studio::all();
        return view('admin.studio.index', compact('studio'));
    }

    public function create()
    {
        return view('admin.studio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_studio' => 'required',
            'harga_per_jam' => 'required|numeric',
            'kapasitas' => 'required|integer|min:1',
            'fasilitas' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Default foto
        $fotoName = null;

        // Upload foto
        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('studio'), $fotoName);
        }

        Studio::create([
            'nama_studio' => $request->nama_studio,
            'harga_per_jam' => $request->harga_per_jam,
            'kapasitas' => $request->kapasitas,
            'fasilitas' => $request->fasilitas,
            'foto' => $fotoName,
        ]);

        return redirect()->route('admin.studio.index')->with('success', 'Studio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $studio = Studio::findOrFail($id);
        return view('admin.studio.edit', compact('studio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_studio' => 'required',
            'harga_per_jam' => 'required|numeric',
            'kapasitas' => 'required|integer|min:1',
            'fasilitas' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $studio = Studio::findOrFail($id);

        // Foto sebelumnya
        $fotoName = $studio->foto;

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($fotoName && file_exists(public_path('studio/' . $fotoName))) {
                unlink(public_path('studio/' . $fotoName));
            }

            // Upload foto baru
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('studio'), $fotoName);
        }

        $studio->update([
            'nama_studio' => $request->nama_studio,
            'harga_per_jam' => $request->harga_per_jam,
            'kapasitas' => $request->kapasitas,
            'fasilitas' => $request->fasilitas,
            'foto' => $fotoName,
        ]);

        return redirect()->route('admin.studio.index')->with('success', 'Studio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $studio = Studio::findOrFail($id);

        if ($studio->foto && file_exists(public_path('studio/' . $studio->foto))) {
            unlink(public_path('studio/' . $studio->foto));
        }

        $studio->delete();

        return redirect()->route('admin.studio.index')->with('success', 'Studio berhasil dihapus!');
    }
}
