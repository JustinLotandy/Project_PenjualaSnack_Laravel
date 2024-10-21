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
        Schema::create('carts', function (Blueprint $table) {
            $table->char('kode_cart')->primary();
            $table->char('kode_pengguna');
            $table->char('Product_id', length: 255); 
            $table->char('QTY', length: 255);
            $table->char('Desc', length: 255);  
            $table->timestamps();

            $table->foreign('Product_id')->references('kode_produk')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
