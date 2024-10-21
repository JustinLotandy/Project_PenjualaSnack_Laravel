<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_Kategori = new Kategori;
        $data_Kategori->kode_kategori=1;
        $data_Kategori->Nama_kategori='Dry';
        $data_Kategori->View_count='100';
        $data_Kategori->save();

        $data_Kategori = new Kategori;
        $data_Kategori->kode_kategori=2;
        $data_Kategori->Nama_kategori='Wet';
        $data_Kategori->View_count='100';
        $data_Kategori->save();
    }
}
