<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class TahfizhController extends Controller
{
    public function index()
    {
        // Mengambil semua santri dengan data hafalan
        $santriList = Santri::with('hafalanSantri')->get();
        $dataHafalan = [];
        
        foreach ($santriList as $santri) {
            $totalBaris = 0;
    
            // Hitung total baris dari hafalan santri
            foreach ($santri->hafalanSantri as $hafalan) {
                $totalBaris += $hafalan->baris; // Menghitung total baris
            }
    
            // Hitung jumlah Juz dan sisa Halaman
            $totalJuz = floor($totalBaris / 300); // 1 Juz = 300 Baris
            $sisaBaris = $totalBaris % 300; // Sisa baris
            $sisaHalaman = floor($sisaBaris / 15); // 1 Halaman = 15 Baris
    
        // Ambil hafalan terbaru
        $setoranTerbaru = $santri->hafalanSantri->sortByDesc('created_at')->first();
        $setoranTerbaruDetail = $setoranTerbaru 
            ? "Juz: {$setoranTerbaru->juz}, Halaman: {$setoranTerbaru->halaman}" 
            : 'Belum ada setoran';

        $dataHafalan[] = [
            'id' => $santri->id,
            'nama' => $santri->nama,
            'total_hafalan' => "{$totalJuz} Juz - {$sisaHalaman} Halaman",
            'setoran_terbaru' => $setoranTerbaruDetail,
        ];
    }
    
        return view('tahfizh.index', compact('dataHafalan'));
    }
    
    public function create(Santri $santri)
    {
        return view('tahfizh.create', compact('santri'));
    }
    
    public function store(Request $request, Santri $santri)
    {
        $request->validate([
            'juz' => 'required|integer|min:1|max:30',
            'halaman' => 'required|integer|min:1|max:602',
            'baris' => 'required|integer|min:1', // Hanya baris yang diperlukan
        ]);
    
        // Hitung jumlah halaman berdasarkan jumlah baris
        $halaman = ceil($request->baris / 15); // 1 halaman = 15 baris
    
        $santri->hafalanSantri()->create([
            'juz' => $request->juz,
            'halaman' => $request->halaman, // Simpan jumlah halaman yang dihitung
            'baris' => $request->baris,
        ]);
    
        return redirect()->route('tahfizh')->with('success', 'Setoran hafalan berhasil ditambahkan!');
    }
}