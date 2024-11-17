<?php

namespace App\Imports;

use App\Models\DataBank;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataBankImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataBank([
            'kode_databank' => $row['kode_databank'],
            'norek' => $row['norek'],
            'nama_databank' => $row['nama_databank'],
            'file' => $row['file'],
            'created_at' => $row['created_at'],
            'created_by' => $row['created_by'],
        ]);
    }
}
