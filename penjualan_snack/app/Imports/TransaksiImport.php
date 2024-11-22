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
            'kode_transaksi' => $row['kode_transaksi'] ,
            'kode_cart' => $row['kode_cart'] ,
            'kode_databank' => $row['kode_databank'] ,
            'nama_produk' => $row['nama_produk'] ,
            'Total_berat' => $row['total_berat'],
            'Phone' => $row['phone'] ,
            'No_resi' => $row['no_resi'] ,
            'Kurir' => $row['kurir'] ,
            'Kota' => $row['kota'] ,
            'Ongkir' => $row['ongkir'] ,
            'Total' => $row['total'] ,
            'Bukti_tansaksi' => $row['bukti_tansaksi'] ,
            'Status' => $row['status'] ,
            'Date' => $row['date'] ,
            'Adress' => $row['adress'] ,
        ]);
    }
}
