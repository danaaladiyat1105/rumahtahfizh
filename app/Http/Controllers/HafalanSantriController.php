<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HafalanSantri;
use App\Models\Santri;

class HafalanSantriController extends Controller
{
    public function index()
    {
        $santri = Santri::with('hafalan')->get();
        return view('hafalan.index', compact('santri'));
    }

    public function create($santri_id)
    {
        $santri = Santri::findOrFail($santri_id);
        return view('hafalan.create', compact('santri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santri,id',
            'juz' => 'required|integer|min:1|max:30',
            'halaman' => 'required|integer|min:1|max:20',
            'baris' => 'required|integer|min:1|max:15',
        ]);

        HafalanSantri::create([
            'santri_id' => $request->santri_id,
            'juz' => $request->juz,
            'halaman' => $request->halaman,
            'baris' => $request->baris,
        ]);

        return redirect()->route('hafalan.index')->with('success', 'Setoran hafalan berhasil ditambahkan.');
    }
}
