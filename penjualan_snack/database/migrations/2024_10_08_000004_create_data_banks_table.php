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
        Schema::create('data_banks', function (Blueprint $table) {
            $table->char('kode_databank')->primary();
            $table->char('norek', length: 255); 
            $table->char('nama_databank', length: 255); 
            $table->char('file', length: 255); 
            $table->datetime('created_at'); 
            $table->char('created_by', length: 255); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_banks');
    }
};
