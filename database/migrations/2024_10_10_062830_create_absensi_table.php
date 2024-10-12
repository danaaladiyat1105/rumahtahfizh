<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id'); // Pastikan ini sesuai
            $table->enum('status', ['hadir', 'izin', 'tanpa_keterangan']);
            $table->date('tanggal');
            $table->timestamps();
        
            // Pastikan foreign key ini merujuk ke tabel dan kolom yang tepat
            $table->foreign('santri_id')->references('id')->on('santri')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
