<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();
        return view('biodata.index', compact('biodata'));
    }

    public function create()
    {
        return view('biodata.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'nim'       => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'foto'      => 'required|image|max:2048',
        ]);

        $data['foto'] = $this->simpanFoto($request, $data['nama'], $data['nim']);

        Biodata::create($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil ditambahkan.');
    }

    public function edit(Biodata $biodata)
    {
        return view('biodata.form', compact('biodata'));
    }

    public function update(Request $request, Biodata $biodata)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'nim'       => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($biodata->foto);
            $data['foto'] = $this->simpanFoto($request, $data['nama'], $data['nim']);
        }

        $biodata->update($data);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil diperbarui.');
    }

    public function destroy(Biodata $biodata)
    {
        Storage::disk('public')->delete($biodata->foto);
        $biodata->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata berhasil dihapus.');
    }

    private function simpanFoto(Request $request, string $nama, string $nim): string
    {
        $file = $request->file('foto');
        $namaFile = Str::slug($nama) . '-' . $nim . '.' . $file->getClientOriginalExtension();

        return $file->storeAs('foto', $namaFile, 'public');
    }
}