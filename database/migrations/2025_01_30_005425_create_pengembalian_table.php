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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->integer('id_pengembalian', true);
            $table->integer('id_peminjaman')->nullable()->index('id_peminjaman');
            $table->dateTime('tanggal_dikembalikan')->useCurrent();
            $table->enum('kondisi_saat_kembali', ['Baik', 'Perlu diperbaiki', 'Rusak']);
            $table->char('nip_penerima', 18)->nullable()->index('nip_penerima');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
