<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $prestasis = Prestasi::latest();

        if ($search) {
            $prestasis->where('deskripsi', 'like', "%$search%")
                      ->orWhere('tahun_ajaran', 'like', "%$search%");
        }

        $prestasis = $prestasis->get();

        return view('admin.prestasi.index', compact('prestasis', 'search'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'deskripsi' => 'required',
            'tahun_ajaran' => 'required|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $data = $request->validate([
            'deskripsi' => 'required',
            'tahun_ajaran' => 'required|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi')
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }

    public function landing()
    {
        $prestasis = Prestasi::latest()->get();

        return view('landing.prestasi.index', compact('prestasis'));
    }

    public function detail($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('landing.prestasi.detail', compact('prestasi'));
    }
}