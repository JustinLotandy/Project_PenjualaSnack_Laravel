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
            $table->integer('id',autoIncrement:11)->primary();
            $table->integer('Userid');
            $table->char('Transactionnumber', length: 255); 
            $table->integer('Total_berat');
            $table->char('Phone', length: 255);
            $table->char('No-resi', length: 255);
            $table->char('Kurir');
            $table->char('Kota', length: 255);
            $table->integer('Ongkir');
            $table->integer('Total');
            $table->char('Bukit_tansaksi');
            $table->char('Status', length: 255);
            $table->dateTime('Date');
            $table->char('Adress');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
