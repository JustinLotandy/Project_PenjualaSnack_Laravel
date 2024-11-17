<?php

namespace App\Imports;

use App\Models\TransactionDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionDetailImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TransactionDetail([
            'kode_transaction_detail' => $row['kode_transaction_detail'],
            'kode_product' => $row['kode_product'],
            'kode_transaksi' => $row['kode_transaksi'],
            'Qty' => $row['qty'],
            'Price' => $row['price'],
        ]);
    }
}
