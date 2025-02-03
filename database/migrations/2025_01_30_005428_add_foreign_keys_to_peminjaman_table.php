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
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign(['nisn'], 'peminjaman_ibfk_1')->references(['nisn'])->on('murid')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_barang'], 'peminjaman_ibfk_2')->references(['id_barang'])->on('barang')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['nip_peminjam'], 'peminjaman_ibfk_3')->references(['nip'])->on('guru')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign('peminjaman_ibfk_1');
            $table->dropForeign('peminjaman_ibfk_2');
            $table->dropForeign('peminjaman_ibfk_3');
        });
    }
};
