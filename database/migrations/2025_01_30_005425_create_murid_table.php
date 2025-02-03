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
        Schema::create('murid', function (Blueprint $table) {
            $table->char('nisn', 10)->primary();
            $table->string('nama', 50);
            $table->string('email', 100)->unique('email');
            $table->string('nomor_ponsel_murid', 20)->nullable()->unique('nomor_ponsel_murid');
            $table->string('alamat')->nullable();
            $table->enum('status_akun', ['Aman', 'Melanggar'])->nullable()->default('Aman');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murid');
    }
};
