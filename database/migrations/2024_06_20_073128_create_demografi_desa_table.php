<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demografi_desa', function (Blueprint $table) {
            $table->id();
            $table->integer('angka_kelahiran');
            $table->integer('angka_kematian');
            $table->integer('jumlah_pria');
            $table->integer('jumlah_perempuan');
            $table->integer('jumlah_anak_anak');
            $table->integer('jumlah_dewasa');
            $table->integer('jumlah_lansia');
            $table->integer('jumlah_penduduk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demografi_desa');
    }
};
