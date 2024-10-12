<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'hafalan',
        'alamat',
        'nama_ayah',
        'nama_ibu',
    ];

    // Tentukan nama tabel yang benar
    protected $table = 'santri';

        // Tambahkan relasi ini
        public function hafalansantri() // atau nama lain yang sesuai, misal tahfizh
        {
            return $this->hasMany(HafalanSantri::class); // ganti Hafalan dengan model yang sesuai
        }

        public function absensi()
        {
            return $this->hasMany(Absensi::class);
        }
}
