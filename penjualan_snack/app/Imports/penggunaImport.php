<?php

namespace App\Imports;

use App\Models\Pengguna;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class penggunaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pengguna([
            'kode_pengguna' => $row['kode_pengguna'],
            'Username' => $row['username'], 
            'password' => bcrypt($row['password']), 
            'Role' => $row['role'],
        ]);
    }
}
