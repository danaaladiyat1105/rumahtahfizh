<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHafalanSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hafalan_santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id'); // relasi dengan tabel santri
            $table->integer('juz');
            $table->integer('halaman');
            $table->integer('baris');
            $table->timestamps();

            // Tambahkan foreign key untuk santri
            $table->foreign('santri_id')->references('id')->on('santri')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hafalan_santri');
    }
}
