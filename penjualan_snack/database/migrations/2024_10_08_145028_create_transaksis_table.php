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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->char('kode_transaksi',length:50)->primary();
            $table->char('kode_databank');
            $table->char('kode_cart'); 
            $table->char('nama_produk');
            $table->integer('Total_berat');
            $table->char('Phone', length: 255);
            $table->char('No_resi', length: 255);
            $table->char('Kurir');
            $table->char('Kota', length: 255);
            $table->integer('Ongkir');
            $table->integer('Total');
            $table->char('Bukti_tansaksi');
            $table->enum('Status',  ['pending', 'approved', 'rejected']);
            $table->dateTime('Date');
            $table->char('Adress');
            
            $table->foreign('kode_databank')->references('kode_databank')->on('data_banks');
            $table->foreign('kode_cart')->references('kode_cart')->on('carts');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
