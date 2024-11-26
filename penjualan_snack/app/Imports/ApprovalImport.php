<?php

namespace App\Imports;

use App\Models\Approval;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ApprovalImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Mengembalikan model dengan data sesuai kolom pada Excel
        return new Approval([
            'kode_transaksi' => $row['kode_transaksi'],
            'No_resi' => $row['no_resi'],
            'kode_customer' => $row['kode_customer'],
            'nama_customer' => $row['nama_customer'],
            'Status' => $row['status'],
        ]);
    }
}
