<?php

namespace App\Http\Controllers;

use App\Models\Kopdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KopdesController extends Controller
{
    // Menampilkan List Kopdes
    public function index()
    {
        $kopdes = Kopdes::latest()->get();
        return view('kopdes.index', compact('kopdes'));
    }

    // Menampilkan Formulir Tambah
    public function create()
    {
        return view('kopdes.create');
    }

    // Menyimpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko_kopdes' => 'required',
            'nama_manajer'      => 'required',
            'alamat'            => 'required',
            'tanggal_berdiri'   => 'required|date',
            'foto_kopdes'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_kopdes')) {
            $data['foto_kopdes'] = $request->file('foto_kopdes')->store('uploads/kopdes', 'public');
        }

        Kopdes::create($data);

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil disimpan!');
    }

    // Menampilkan Form Edit
    public function edit(Kopdes $kopde)
    {
        return view('kopdes.edit', ['kopdes' => $kopde]);
    }

    // Memperbarui Data (Update)
    public function update(Request $request, Kopdes $kopde)
    {
        $request->validate([
            'nama_toko_kopdes' => 'required',
            'nama_manajer'      => 'required',
            'alamat'            => 'required',
            'tanggal_berdiri'   => 'required|date',
            'foto_kopdes'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Cek jika ada foto baru yang diunggah
        if ($request->hasFile('foto_kopdes')) {
            // Hapus foto lama jika ada
            if ($kopde->foto_kopdes && Storage::disk('public')->exists($kopde->foto_kopdes)) {
                Storage::disk('public')->delete($kopde->foto_kopdes);
            }
            // Simpan foto baru
            $data['foto_kopdes'] = $request->file('foto_kopdes')->store('uploads/kopdes', 'public');
        }

        $kopde->update($data);

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil diperbarui!');
    }

    // Menghapus Data (Delete)
    public function destroy(Kopdes $kopde)
    {
        // Hapus file foto dari storage jika ada
        if ($kopde->foto_kopdes && Storage::disk('public')->exists($kopde->foto_kopdes)) {
            Storage::disk('public')->delete($kopde->foto_kopdes);
        }

        $kopde->delete();

        return redirect()->route('kopdes.index')->with('success', 'Data Kopdes berhasil dihapus!');
    }
}