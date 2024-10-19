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
        Schema::create('produks', function (Blueprint $table) {
            $table->char('kode_produk')->primary();
            $table->char('Userid');
            $table->char('Kategori', length: 255); 
            $table->char('Isi', length: 255);
            $table->char('Ukuran', length: 255);
            $table->char('Expired', length: 255);
            $table->integer('Berat');
            $table->char('Deskirpsi', length: 255);
            $table->char('Nama_produk', length: 255);
            $table->char('file', length: 255);
            $table->dateTime('Created_at');
            $table->char('Created_by', length: 255);
            $table->integer('Stok');
            $table->integer('Harga');

            $table->foreign('Userid')->references('kode_pengguna')->on('penggunas');
            $table->foreign('Kategori')->references('kode_kategori')->on('kategoris');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
