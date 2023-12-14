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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('nik');
            $table->string('name');
            $table->string('ttl');
            $table->string('alamat');
            $table->string('departemen');
            $table->string('jabatan');
            $table->string('golongan');
            $table->string('divisi');
            $table->string('status_karyawan');
            $table->string('deskripsi');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
