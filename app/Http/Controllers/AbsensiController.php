<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // Menampilkan halaman daftar hadir dengan persentase kehadiran
    public function index()
    {
        // Ambil semua data santri
        $santri = Santri::all();
    
        // Siapkan array untuk menyimpan data absensi
        $absensiData = [];
    
        // Looping untuk setiap santri
        foreach ($santri as $s) {
            // Hitung jumlah hadir, izin, dan tanpa keterangan
            $hadir = Absensi::where('santri_id', $s->id)->where('status', 'hadir')->count();
            $izin = Absensi::where('santri_id', $s->id)->where('status', 'izin')->count();
            $tanpa_keterangan = Absensi::where('santri_id', $s->id)->where('status', 'tanpa_keterangan')->count();
    
            // Simpan data ke dalam array
            $absensiData[] = [
                'santri' => $s,
                'hadir' => $hadir,
                'izin' => $izin,
                'tanpa_keterangan' => $tanpa_keterangan,
            ];
        }
    
        // Kirim data absensi ke view
        return view('absensi.index', compact('absensiData'));
    }
    

    // Form absensi harian
    public function create()
    {
        $santri = Santri::all();
        return view('absensi.create', compact('santri'));
    }

    // Simpan absensi
    public function store(Request $request)
    {
        $santriIds = $request->input('santri_id');
        $tanggal = now()->format('Y-m-d'); // Tanggal hari ini
    
        // Periksa apakah $santriIds adalah array
        if (is_array($santriIds)) {
            foreach ($santriIds as $santriId => $status) {
                // Cek apakah ada absensi untuk santri tersebut pada tanggal ini
                $existingAbsensi = Absensi::where('santri_id', $santriId)
                    ->where('tanggal', $tanggal)
                    ->first();
    
                if ($existingAbsensi) {
                    // Jika sudah ada, perbarui status absensi
                    $existingAbsensi->update([
                        'status' => $status,
                    ]);
                } else {
                    // Jika belum ada, simpan absensi baru
                    Absensi::create([
                        'santri_id' => $santriId,
                        'status' => $status,
                        'tanggal' => $tanggal,
                    ]);
                }
            }
        } else {
            // Tangani kasus jika tidak ada data yang dikirim
            return redirect()->route('absensi')->with('error', 'Tidak ada data absensi yang dikirim.');
        }
    
        return redirect()->route('absensi')->with('success', 'Absensi berhasil disimpan!');
    }
    
    
}