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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->char('kode_transaksi', 50);
            $table->char('No_resi', 255);
            $table->char('kode_customer', 50);
            $table->char('nama_customer', 255);
            $table->enum('Status', ['Pending', 'Approved', 'Rejected'])->default('Pending'); // Pastikan definisi kolom ini benar
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');

    }
};
