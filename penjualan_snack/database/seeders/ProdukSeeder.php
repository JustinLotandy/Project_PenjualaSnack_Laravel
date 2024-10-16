<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = new Produk; 
        $produk->id_produk = 1; 

        $produk->user_id = 1; 
        $produk->kategori = 'Snack Kentang'; 
        $produk->isi = '100'; 
        $produk->ukuran = '10cm'; 
        $produk->expired = '2024-12-31'; 
        $produk->berat = 250; 
        $produk->deskripsi = 'Snack kentang rasa balado'; 
        $produk->nama_produk = 'Kentangs'; 
        $produk->file = 'image.jpg'; 
        $produk->created_at = now(); 
        $produk->id_pengguna= 1; 
        $produk->stok = 100; 
        $produk->harga = 15000; 
        $produk->save(); 
    }
}
