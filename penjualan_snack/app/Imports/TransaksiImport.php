<?php

namespace App\Imports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class TransaksiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Transaksi([
            'kode_transaksi' => $row['kode_transaksi'],
            'kode_cart' => $row['kode_cart'],
            'kode_databank' => $row['kode_databank'],
            'kode_customer' => $row['kode_customer'], // Tambahkan sesuai migration
            'nama_customer' => $row['nama_customer'], // Tambahkan sesuai migration
            'nama_produk' => $row['nama_produk'],
            'Total_berat' => $row['total_berat'],
            'Phone' => $row['phone'],
            'No_resi' => $row['no_resi'],
            'Kurir' => $row['kurir'],
            'Kota' => $row['kota'],
            'Ongkir' => $row['ongkir'],
            'Total' => $row['total'],
            'Bukti_transaksi' => $row['bukti_transaksi'], // Perbaiki typo pada nama kunci
            'Date' => $row['date'],
            'Adress' => $row['adress'],
            'QTY' => $row['qty'], // Tambahkan sesuai migration
            'status_approval' => $row['status_approval'], // Perbaikan nama kunci dan penyesuaian migration
        ]);
        
    }
}
