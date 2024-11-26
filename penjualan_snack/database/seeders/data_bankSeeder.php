<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataBank;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class data_bankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
    
        $dataBankData = [
            [
                'kode_databank' => 'BANK-001',
                'norek' => '126543212',
                'nama_databank' => 'Hardy',
                'file' => 'images/Bukti.png',
                'created_at' => Carbon::now(),
                'created_by' => 'Budi',
            ],
        ];
        foreach ($dataBankData as $item) {
            
            if (Storage::disk('public')->exists($item['file'])) {
                DataBank::create($item);
            } else {
                echo "File {$item['file']} tidak ditemukan di storage/public/uploads/images.\n";
            }
        }
    }
}
