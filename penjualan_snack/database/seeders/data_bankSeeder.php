<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataBank;
use Carbon\Carbon;

class data_bankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DataBank::query()->delete();
        $databank = new DataBank;
        $databank->id_databank=1;
        $databank->norek='126543212';
        $databank->nama_databank='Hardy';
        $databank->file='buktitransaksi.pdf';
        $databank->created_at=Carbon::now();
        $databank->created_by='Budi';
        $databank->save();
    }
}
