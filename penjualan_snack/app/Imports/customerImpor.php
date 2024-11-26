<?php

namespace App\Imports;

use App\Models\Approval;
use App\Models\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class customerImpor implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Mengembalikan model dengan data sesuai kolom pada Excel
        return new customer([
            'kode_customer' => $row['kode_customer'],
            'nama_customer' => $row['nama_customer'],
            'no_telepon' => $row['no_telepon'],
        ]);
        
    }
}
