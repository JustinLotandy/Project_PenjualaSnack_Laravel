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
                'kode_databank' => 1,
                'kode_cart' => 'CART001',
                'nama_produk' => 'Potato Chips',
                'total_berat' => 500,
                'phone' => '081234567890',
                'no_resi' => 'RESI-001',
                'kurir' => 'JNE',
                'kota' => 'Jakarta',
                'ongkir' => 15000,
                'total' => 65000,
                'bukti_tansaksi' => 'images/Bukti.png',
                'status' => 'Pending',
                'date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.1',
            ],
            [
                'kode_transaksi' => 'TRK-0002',
                'kode_databank' => 1,
                'kode_cart' => 'CART002',
                'nama_produk' => 'Pudding',
                'total_berat' => 300,
                'phone' => '081234567891',
                'no_resi' => 'RESI-002',
                'kurir' => 'Tiki',
                'kota' => 'Bandung',
                'ongkir' => 12000,
                'total' => 42000,
                'bukti_tansaksi' => 'images/Bukti.png',
                'status' => 'approved',
                'date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.2',
            ],
            [
                'kode_transaksi' => 'TRK-0003',
                'kode_databank' => 1,
                'kode_cart' => 'CART003',
                'nama_produk' => 'Biscuits',
                'total_berat' => 400,
                'phone' => '081234567892',
                'no_resi' => 'RESI-003',
                'kurir' => 'JNE',
                'kota' => 'Surabaya',
                'ongkir' => 20000,
                'total' => 60000,
                'bukti_tansaksi' => 'images/Bukti.png',
                'status' => 'Pending',
                'date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.3',
            ],
            [
                'kode_transaksi' => 'TRK-0004',
                'kode_databank' => 1,
                'kode_cart' => 'CART004',
                'nama_produk' => 'Jelly',
                'total_berat' => 250,
                'phone' => '081234567893',
                'no_resi' => 'RESI-004',
                'kurir' => 'Tiki',
                'kota' => 'Yogyakarta',
                'ongkir' => 10000,
                'total' => 35000,
                'bukti_tansaksi' => 'images/Bukti.png',
                'status' => 'approved',
                'date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.4',
            ],
            [
                'kode_transaksi' => 'TRK-0005',
                'kode_databank' => 1,
                'kode_cart' => 'CART005',
                'nama_produk' => 'Popcorn',
                'total_berat' => 200,
                'phone' => '081234567894',
                'no_resi' => 'RESI-005',
                'kurir' => 'JNE',
                'kota' => 'Medan',
                'ongkir' => 15000,
                'total' => 35000,
                'bukti_tansaksi' => 'images/Bukti.png',
                'status' => 'Pending',
                'date' => Carbon::now(),
                'Adress' => 'Jalan Contoh No.5',
            ],
        ];

        // Simpan data transaksi ke database
        foreach ($transaksiData as $item) {
            // Pastikan file gambar ada
            if (Storage::disk('public')->exists($item['bukti_tansaksi'])) {
                Transaksi::create($item);
            } else {
                echo "File {$item['bukti_tansaksi']} tidak ditemukan di storage/public/uploads/images.\n";
            }
        }
    }
}
