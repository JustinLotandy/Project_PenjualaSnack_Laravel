<?php

namespace Database\Seeders;

use App\Models\Transaksi; 
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data transaksi
        $transaksiData = [
            [
                'kode_transaksi' => 'TRK-0001',
                'kode_databank' => 'BANK-001', 
                'kode_cart' => 'CART-001',
                'kode_customer' => 'CUST001',
                'nama_customer' => 'John Doe',
                'nama_produk' => 'Potato Chips',
                'Total_berat' => 500,
                'Phone' => '081234567890',
                'No_resi' => 'RESI-001',
                'Kurir' => 'JNE',
                'Kota' => 'Jakarta',
                'Ongkir' => 15000,
                'Total' => 65000,
                'Bukti_transaksi' => 'images/Bukti.png', // Perbaikan nama kunci
                'Date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.1',
                'QTY' => '5',
                'status_approval' => 'Pending',
            ],
            [
                'kode_transaksi' => 'TRK-0002',
                'kode_databank' => 'BANK-001',
                'kode_cart' => 'CART-002',
                'kode_customer' => 'CUST002',
                'nama_customer' => 'Jane Smith',
                'nama_produk' => 'Pudding',
                'Total_berat' => 300,
                'Phone' => '081234567891',
                'No_resi' => 'RESI-002',
                'Kurir' => 'Tiki',
                'Kota' => 'Bandung',
                'Ongkir' => 12000,
                'Total' => 42000,
                'Bukti_transaksi' => 'images/Bukti.png', // Perbaikan nama kunci
                'Date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.2',
                'QTY' => '10',
                'status_approval' => 'Approved',
            ],
            [
                'kode_transaksi' => 'TRK-0003',
                'kode_databank' => 'BANK-001',
                'kode_cart' => 'CART-003',
                'kode_customer' => 'CUST003',
                'nama_customer' => 'Michael Johnson',
                'nama_produk' => 'Biscuits',
                'Total_berat' => 400,
                'Phone' => '081234567892',
                'No_resi' => 'RESI-003',
                'Kurir' => 'JNE',
                'Kota' => 'Surabaya',
                'Ongkir' => 20000,
                'Total' => 60000,
                'Bukti_transaksi' => 'images/Bukti.png', // Perbaikan nama kunci
                'Date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.3',
                'QTY' => '3',
                'status_approval' => 'Pending',
            ],
        ];

        // Simpan data transaksi ke database
        foreach ($transaksiData as $item) {
            // Pastikan file gambar ada
            if (Storage::disk('public')->exists($item['Bukti_transaksi'])) {
                Transaksi::create($item);
            } else {
                echo "File {$item['Bukti_transaksi']} tidak ditemukan di storage/public/uploads/images.\n";
            }
        }
    }
}
