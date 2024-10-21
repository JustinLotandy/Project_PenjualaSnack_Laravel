<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransaksiDetail;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_pengguna = new detailTransaksi;
        $data_pengguna->kode_product='P-001';
        $data_pengguna->kode_transaksi='TRK-001';
        $data_pengguna->Username='Budi';
        $data_pengguna->password='12345';
        $data_pengguna->Role='Stok mangement';
        $data_pengguna->save();
    }
}
$table->char('kode_transaction_detail')->primary();
            $table->integer('kode_product');
            $table->char('kode_transaksi',length:50);  
            $table->integer('Qty');
            $table->integer('Price');
            $table->timestamps();
            $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksis');