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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('judul_buku')->nullable();
            $table->string('penyusun_buku')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('kode_buku')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->integer('jumlah')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
