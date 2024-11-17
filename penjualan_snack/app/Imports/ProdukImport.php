<?php

namespace App\Imports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProdukImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produk([
            'kode_produk' => $row['kode_produk'],
            'Userid' => $row['userid'], 
            'Kategori' => $row['kategori'],
            'Isi' => $row['isi'],
            'Ukuran' => $row['ukuran'],
            'Expired' => $row['expired'],
            'Berat' => $row['berat'],
            'Deskirpsi' => $row['deskirpsi'], 
            'Nama_produk' => $row['nama_produk'],
            'file' => $row['file'],
            'Created_at' => $row['created_at'],
            'Created_by' => $row['created_by'],
            'Stok' => $row['stok'],
            'Harga' => $row['harga'],
        ]);
    }
}
