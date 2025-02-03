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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->integer('id_peminjaman', true);
            $table->char('nisn', 10)->nullable()->index('nisn');
            $table->integer('id_barang')->nullable()->index('id_barang');
            $table->integer('jumlah_dipinjam');
            $table->dateTime('tanggal_pinjam')->useCurrent();
            $table->dateTime('tanggal_harus_kembali');
            $table->enum('status', ['Dipinjam', 'Dikembalikan', 'Terlambat', 'Hilang'])->nullable()->default('Dipinjam');
            $table->enum('kondisi_saat_dipinjam', ['Baik', 'Perlu diperbaiki', 'Rusak'])->default('Baik');
            $table->char('nip_peminjam', 18)->nullable()->index('nip_peminjam');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
