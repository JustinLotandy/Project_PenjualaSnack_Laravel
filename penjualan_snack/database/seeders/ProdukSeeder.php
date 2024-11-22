<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkData = [
            [
                'kode_produk' => 'P-004',
                'userid' => 'US-001',
                'created_by' => 'Butet',
                'kategori' => 1,
                'isi' => '100',
                'ukuran' => '10cm',
                'expired' => '2024-12-31',
                'berat' => 250,
                'Deskirpsi' => 'Snack kentang rasa balado',
                'nama_produk' => 'Kentangs',
                'file' => 'images/Kentang.png',
                'created_at' => Carbon::now(),
                'stok' => 100,
                'harga' => 15000,
            ],
            [
                'kode_produk' => 'P-005',
                'userid' => 'US-001',
                'created_by' => 'Butet',
                'kategori' => 1,
                'isi' => '100',
                'ukuran' => '10cm',
                'expired' => '2024-12-31',
                'berat' => 250,
                'Deskirpsi' => 'Popcorn',
                'nama_produk' => 'Popcorn',
                'file' => 'images/Popcorn.png',
                'created_at' => Carbon::now(),
                'stok' => 100,
                'harga' => 15000,
            ],
            [
                'kode_produk' => 'P-001',
                'userid' => 'US-001',
                'created_by' => 'Butet',
                'kategori' => 1,
                'isi' => '100',
                'ukuran' => '10cm',
                'expired' => '2024-12-31',
                'berat' => 250,
                'Deskirpsi' => 'Dry snack - Potato Chips',
                'nama_produk' => 'Kentangs',
                'file' => 'images/Chips.png',
                'created_at' => Carbon::now(),
                'stok' => 100,
                'harga' => 15000,
            ],
            [
                'kode_produk' => 'P-002',
                'userid' => 'US-002',
                'created_by' => 'Butet',
                'kategori' => 2,
                'isi' => '150',
                'ukuran' => '15cm',
                'expired' => '2025-01-31',
                'berat' => 300,
                'Deskirpsi' => 'Wet snack - Pudding',
                'nama_produk' => 'Pudding',
                'file' => 'images/Pudding.png',
                'created_at' => Carbon::now(),
                'stok' => 200,
                'harga' => 12000,
            ],
            [
                'kode_produk' => 'P-003',
                'userid' => 'US-001',
                'created_by' => 'Butet',
                'kategori' => 1,
                'isi' => '50',
                'ukuran' => '8cm',
                'expired' => '2024-11-30',
                'berat' => 100,
                'Deskirpsi' => 'Dry snack - Biscuits',
                'nama_produk' => 'Biscuits',
                'file' => 'images/Bisquit.png',
                'created_at' => Carbon::now(),
                'stok' => 150,
                'harga' => 10000,
            ],
        ];

        foreach ($produkData as $item) {
            // Pastikan file gambar ada
            if (Storage::disk('public')->exists($item['file'])) {
                Produk::create($item);
            } else {
                echo "File {$item['file']} tidak ditemukan di storage/public/uploads/files.\n";
            }
        }
    }
}
