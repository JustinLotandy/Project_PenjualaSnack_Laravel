<?php

namespace App\Imports;

use App\Models\Cart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CartImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
{
    // Mengembalikan model dengan data sesuai kolom pada Excel
    return new Cart([
        'kode_cart' => $row['kode_cart'],
        'kode_pengguna' => $row['kode_pengguna'],
        'Product_id' => $row['product_id'],
        'QTY' => $row['qty'],
        'Desc' => $row['desc'],
    ]);
}

}
