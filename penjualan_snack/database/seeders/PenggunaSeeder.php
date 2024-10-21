<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengguna;


class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengguna = new Pengguna;
        $pengguna->kode_pengguna='US-001';
        $pengguna->Username='Budi';
        $pengguna->password='12345';
        $pengguna->Role='Stok mangement';
        $pengguna->save();

        $pengguna = new Pengguna;
        $pengguna->kode_pengguna='US-002';
        $pengguna->Username='Gary';
        $pengguna->password='12345';
        $pengguna->Role='Stok mangement';
        $pengguna->save();
    }
}
