<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Carbon\Carbon; // Tambahkan Carbon untuk perhitungan usia

class SantriController extends Controller
{
    // Method untuk menampilkan daftar santri
    public function index()
    {
        $santri = Santri::all(); // Ambil semua data santri dari database

        // Tambahkan perhitungan usia untuk setiap santri
        foreach ($santri as $s) {
            $s->usia = Carbon::parse($s->tanggal_lahir)->age; // Hitung usia dari tanggal lahir
        }

        return view('santri.index', compact('santri')); // Kirim data ke view index.blade.php
    }

    // Method untuk menampilkan form penambahan santri
    public function create()
    {
        return view('santri.create'); // Tampilkan form untuk menambah data santri
    }

    // Method untuk menyimpan data santri baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'hafalan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        // Simpan data santri ke database
        Santri::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'hafalan' => $request->hafalan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('santri.index')->with('success', 'Santri berhasil ditambahkan');
    }

    // Method untuk menampilkan form edit santri
    public function edit($id)
    {
        $santri = Santri::findOrFail($id); // Gunakan findOrFail untuk error handling
        return view('santri.edit', compact('santri')); // Kirim data santri ke form edit
    }

    // Method untuk update data santri
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'hafalan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        // Update data santri
        $santri = Santri::findOrFail($id);
        $santri->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'hafalan' => $request->hafalan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('santri.index')->with('success', 'Santri berhasil diperbarui');
    }

    // Method untuk menghapus santri
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id); // Gunakan findOrFail untuk error handling
        $santri->delete(); // Hapus data santri dari database

        return redirect()->route('santri.index')->with('success', 'Santri berhasil dihapus');
    }

    // Method untuk menampilkan dashboard
    public function dashboard()
    {
        $totalSantri = Santri::count(); // Hitung total santri dari database
        return view('dashboard', compact('totalSantri')); // Kirim jumlah santri ke view dashboard.blade.php
    }
}
