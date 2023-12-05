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
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id()->primary;
            $table->integer('id_anggota');
            $table->integer('no_pinjaman');
            $table->string('tgl_pinjaman');
            $table->string('pinjaman');
            $table->string('bunga');
            $table->string('tenor');
            $table->string('jatuh_tempo');
            $table->string('deskripsi');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamans');
    }
};
