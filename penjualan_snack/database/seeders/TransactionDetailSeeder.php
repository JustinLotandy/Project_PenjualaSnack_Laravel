<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionDetail;

class TransactionDetailSeeder extends Seeder
{
  
    public function run(): void
    {
        $data_detailtransaksi = new TransactionDetail();
        $data_detailtransaksi->kode_transaction_detail = 'KTD-001';
        $data_detailtransaksi->kode_product = 'P-001'; // Sama dengan produk di Cart dan Transaksi
        $data_detailtransaksi->kode_transaksi = 'TRK-0001'; // Sama dengan transaksi
        $data_detailtransaksi->QTY = '5'; // Sesuai dengan Cart QTY
        $data_detailtransaksi->Price = '12345'; // Harga yang diberikan
        $data_detailtransaksi->save();

        $data_detailtransaksi = new TransactionDetail();
        $data_detailtransaksi->kode_transaction_detail = 'KTD-002';
        $data_detailtransaksi->kode_product = 'P-002';
        $data_detailtransaksi->kode_transaksi = 'TRK-0002';
        $data_detailtransaksi->QTY = '10';
        $data_detailtransaksi->Price = '23456';
        $data_detailtransaksi->save();

        
        $data_detailtransaksi = new TransactionDetail();
        $data_detailtransaksi->kode_transaction_detail = 'KTD-003';
        $data_detailtransaksi->kode_product = 'P-003';
        $data_detailtransaksi->kode_transaksi = 'TRK-0003';
        $data_detailtransaksi->QTY = '3';
        $data_detailtransaksi->Price = '34567';
        $data_detailtransaksi->save();

        $data_detailtransaksi = new TransactionDetail();
        $data_detailtransaksi->kode_transaction_detail = 'KTD-004';
        $data_detailtransaksi->kode_product = 'P-004';
        $data_detailtransaksi->kode_transaksi = 'TRK-0004';
        $data_detailtransaksi->QTY = '7';
        $data_detailtransaksi->Price = '45678';
        $data_detailtransaksi->save();

        $data_detailtransaksi = new TransactionDetail();
        $data_detailtransaksi->kode_transaction_detail = 'KTD-005';
        $data_detailtransaksi->kode_product = 'P-005';
        $data_detailtransaksi->kode_transaksi = 'TRK-0005';
        $data_detailtransaksi->QTY = '12';
        $data_detailtransaksi->Price = '56789';
        $data_detailtransaksi->save();
    }
}
