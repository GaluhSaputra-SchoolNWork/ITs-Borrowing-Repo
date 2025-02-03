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
        Schema::create('barang', function (Blueprint $table) {
            $table->integer('id_barang', true);
            $table->string('nama_barang', 100);
            $table->integer('stok_total');
            $table->integer('stok_tersedia');
            $table->enum('kategori', ['Komputer & Aksesoris', 'Dekstop', 'Monitor', 'Komponen Dekstop & Laptop', 'Penyimpanan Data', 'Komponen Network', 'Software', 'Peralatan Kantor', 'Printer & Scanner', 'Aksesoris Dekstop & Laptop', 'Keyboard & Mouse', 'Laptop', 'Gaming', 'Audio Computer', 'Proyektor & Aksesoris', 'Lainnya']);
            $table->enum('status_barang', ['Tersedia', 'Tidak Ada'])->nullable()->default('Tersedia');
            $table->text('deskripsi');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diperbarui_pada')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
