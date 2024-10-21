<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi; 
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_transaksi = new Transaksi;
        $data_transaksi->kode_transaksi = 'TRK-0001';
        $data_transaksi->kode_databank = 1;
        $data_transaksi->userid = 'CART001'; // Sama dengan cart
        $data_transaksi->nama_produk = 'Potato Chips';
        $data_transaksi->Total_berat = 500; // Misal dalam gram
        $data_transaksi->Phone = '081234567890';
        $data_transaksi->No_resi = 'RESI-001';
        $data_transaksi->Kurir = 'JNE';
        $data_transaksi->Kota = 'Jakarta';
        $data_transaksi->Ongkir = 15000; // Misal dalam rupiah
        $data_transaksi->Total = 65000; // Total setelah ongkir
        $data_transaksi->Bukti_tansaksi = 'BUKTI-001';
        $data_transaksi->Status = 'Pending';
        $data_transaksi->Date = Carbon::now();
        $data_transaksi->Adress = 'Jalan Contoh No.1';
        $data_transaksi->save();

    
        $data_transaksi = new Transaksi;
        $data_transaksi->kode_transaksi = 'TRK-0002';
        $data_transaksi->kode_databank = 1;
        $data_transaksi->userid = 'CART002';
        $data_transaksi->nama_produk = 'Pudding';
        $data_transaksi->Total_berat = 300; // Misal dalam gram
        $data_transaksi->Phone = '081234567891';
        $data_transaksi->No_resi = 'RESI-002';
        $data_transaksi->Kurir = 'Tiki';
        $data_transaksi->Kota = 'Bandung';
        $data_transaksi->Ongkir = 12000;
        $data_transaksi->Total = 42000;
        $data_transaksi->Bukti_tansaksi = 'BUKTI-002';
        $data_transaksi->Status = 'Confirmed';
        $data_transaksi->Date = Carbon::now();
        $data_transaksi->Adress = 'Jalan Contoh No.2';
        $data_transaksi->save();

        
        $data_transaksi = new Transaksi;
        $data_transaksi->kode_transaksi = 'TRK-0003';
        $data_transaksi->kode_databank = 1;
        $data_transaksi->userid = 'CART003';
        $data_transaksi->nama_produk = 'Biscuits';
        $data_transaksi->Total_berat = 400;
        $data_transaksi->Phone = '081234567892';
        $data_transaksi->No_resi = 'RESI-003';
        $data_transaksi->Kurir = 'JNE';
        $data_transaksi->Kota = 'Surabaya';
        $data_transaksi->Ongkir = 20000;
        $data_transaksi->Total = 60000;
        $data_transaksi->Bukti_tansaksi = 'BUKTI-003';
        $data_transaksi->Status = 'Pending';
        $data_transaksi->Date = Carbon::now();
        $data_transaksi->Adress = 'Jalan Contoh No.3';
        $data_transaksi->save();

        
        $data_transaksi = new Transaksi;
        $data_transaksi->kode_transaksi = 'TRK-0004';
        $data_transaksi->kode_databank = 1;
        $data_transaksi->userid = 'CART004';
        $data_transaksi->nama_produk = 'Jelly';
        $data_transaksi->Total_berat = 250;
        $data_transaksi->Phone = '081234567893';
        $data_transaksi->No_resi = 'RESI-004';
        $data_transaksi->Kurir = 'Tiki';
        $data_transaksi->Kota = 'Yogyakarta';
        $data_transaksi->Ongkir = 10000;
        $data_transaksi->Total = 35000;
        $data_transaksi->Bukti_tansaksi = 'BUKTI-004';
        $data_transaksi->Status = 'Confirmed';
        $data_transaksi->Date = Carbon::now();
        $data_transaksi->Adress = 'Jalan Contoh No.4';
        $data_transaksi->save();

       
        $data_transaksi = new Transaksi;
        $data_transaksi->kode_transaksi = 'TRK-0005';
        $data_transaksi->kode_databank = 1;
        $data_transaksi->userid = 'CART005';
        $data_transaksi->nama_produk = 'Popcorn';
        $data_transaksi->Total_berat = 200;
        $data_transaksi->Phone = '081234567894';
        $data_transaksi->No_resi = 'RESI-005';
        $data_transaksi->Kurir = 'JNE';
        $data_transaksi->Kota = 'Medan';
        $data_transaksi->Ongkir = 15000;
        $data_transaksi->Total = 35000;
        $data_transaksi->Bukti_tansaksi = 'BUKTI-005';
        $data_transaksi->Status = 'Pending';
        $data_transaksi->Date = Carbon::now();
        $data_transaksi->Adress = 'Jalan Contoh No.5';
        $data_transaksi->save();
    }
}
