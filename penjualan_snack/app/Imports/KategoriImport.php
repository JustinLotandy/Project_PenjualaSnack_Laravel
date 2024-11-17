<?php

namespace App\Imports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KategoriImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kategori([
            'kode_kategori' => $row['kode_kategori'],
            'Nama_kategori' => $row['nama_kategori'], // Sesuaikan dengan nama header di Excel
            'View_count' => $row['view_count'],
        ]);
    }
}
