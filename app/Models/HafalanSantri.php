<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HafalanSantri extends Model
{
    use HasFactory;

    protected $table = 'hafalan_santri';

    protected $fillable = ['santri_id', 'juz', 'halaman', 'baris'];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
