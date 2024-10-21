<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use Carbon\Carbon;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_produk = new Produk; 
        $data_produk->kode_produk = 'P-004';  
        $data_produk->Userid = 'US-001';
        $data_produk->Created_by = 'Butet'; 
        $data_produk->kategori = 1;
        $data_produk->Isi = '100'; 
        $data_produk->ukuran = '10cm'; 
        $data_produk->Expired = '2024-12-31'; 
        $data_produk->Berat = 250; 
        $data_produk->Deskirpsi = 'Snack kentang rasa balado'; 
        $data_produk->nama_produk = 'Kentangs'; 
        $data_produk->file = 'image.jpg'; 
        $data_produk->Created_at = Carbon::now();  
        $data_produk->Stok = 100; 
        $data_produk->Harga = 15000; 
        $data_produk->save(); 

        $data_produk = new Produk; 
        $data_produk->kode_produk = 'P-005';  
        $data_produk->Userid = 'US-001';
        $data_produk->Created_by = 'Butet'; 
        $data_produk->kategori = 1;
        $data_produk->Isi = '100'; 
        $data_produk->ukuran = '10cm'; 
        $data_produk->Expired = '2024-12-31'; 
        $data_produk->Berat = 250; 
        $data_produk->Deskirpsi = 'Poporn'; 
        $data_produk->nama_produk = 'popcorn'; 
        $data_produk->file = 'image.jpg'; 
        $data_produk->Created_at = Carbon::now();  
        $data_produk->Stok = 100; 
        $data_produk->Harga = 15000; 
        $data_produk->save();

        $data_produk = new Produk;
        $data_produk->kode_produk = 'P-001';
        $data_produk->Userid = 'US-001';
        $data_produk->Created_by = 'Butet';
        $data_produk->kategori = 1;
        $data_produk->Isi = '100'; 
        $data_produk->ukuran = '10cm'; 
        $data_produk->Expired = '2024-12-31'; 
        $data_produk->Berat = 250; 
        $data_produk->Deskirpsi = 'Dry snack - Potato Chips'; // Sama dengan deskripsi di tabel cart
        $data_produk->nama_produk = 'Kentangs';
        $data_produk->file = 'image.jpg'; 
        $data_produk->Created_at = Carbon::now();  
        $data_produk->Stok = 100; 
        $data_produk->Harga = 15000; 
        $data_produk->save();

        $data_produk = new Produk;
        $data_produk->kode_produk = 'P-002';
        $data_produk->Userid = 'US-002';
        $data_produk->Created_by = 'Butet';
        $data_produk->kategori = 2;
        $data_produk->Isi = '150'; 
        $data_produk->ukuran = '15cm'; 
        $data_produk->Expired = '2025-01-31'; 
        $data_produk->Berat = 300; 
        $data_produk->Deskirpsi = 'Wet snack - Pudding'; // Sama dengan deskripsi di tabel cart
        $data_produk->nama_produk = 'Pudding';
        $data_produk->file = 'pudding.jpg'; 
        $data_produk->Created_at = Carbon::now();  
        $data_produk->Stok = 200; 
        $data_produk->Harga = 12000; 
        $data_produk->save();

        $data_produk = new Produk;
        $data_produk->kode_produk = 'P-003';
        $data_produk->Userid = 'US-001';
        $data_produk->Created_by = 'Butet';
        $data_produk->kategori = 1;
        $data_produk->Isi = '50'; 
        $data_produk->ukuran = '8cm'; 
        $data_produk->Expired = '2024-11-30'; 
        $data_produk->Berat = 100; 
        $data_produk->Deskirpsi = 'Dry snack - Biscuits'; // Sama dengan deskripsi di tabel cart
        $data_produk->nama_produk = 'Biscuits';
        $data_produk->file = 'biscuits.jpg'; 
        $data_produk->Created_at = Carbon::now();  
        $data_produk->Stok = 150; 
        $data_produk->Harga = 10000; 
        $data_produk->save();
    }
}
