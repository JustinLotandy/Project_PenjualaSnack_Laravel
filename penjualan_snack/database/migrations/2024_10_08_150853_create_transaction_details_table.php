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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->char('kode_transaction_detail')->primary();
            $table->integer('kode_product');
            $table->char('Transactionnumber',length:255);  
            $table->integer('Qty');
            $table->integer('Price');
            $table->timestamps();
            $table->foreign('Transactionnumber')->references('Transactionnumber')->on('transaksis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
