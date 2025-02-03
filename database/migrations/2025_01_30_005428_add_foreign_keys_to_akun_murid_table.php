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
        Schema::table('akun_murid', function (Blueprint $table) {
            $table->foreign(['nisn'], 'akun_murid_ibfk_1')->references(['nisn'])->on('murid')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('akun_murid', function (Blueprint $table) {
            $table->dropForeign('akun_murid_ibfk_1');
        });
    }
};
