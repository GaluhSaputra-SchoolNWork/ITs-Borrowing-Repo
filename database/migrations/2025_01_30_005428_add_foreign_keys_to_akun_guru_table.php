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
        Schema::table('akun_guru', function (Blueprint $table) {
            $table->foreign(['nip'], 'akun_guru_ibfk_1')->references(['nip'])->on('guru')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('akun_guru', function (Blueprint $table) {
            $table->dropForeign('akun_guru_ibfk_1');
        });
    }
};
