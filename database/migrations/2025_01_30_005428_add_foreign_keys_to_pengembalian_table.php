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
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->foreign(['id_peminjaman'], 'pengembalian_ibfk_1')->references(['id_peminjaman'])->on('peminjaman')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['nip_penerima'], 'pengembalian_ibfk_2')->references(['nip'])->on('guru')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->dropForeign('pengembalian_ibfk_1');
            $table->dropForeign('pengembalian_ibfk_2');
        });
    }
};
