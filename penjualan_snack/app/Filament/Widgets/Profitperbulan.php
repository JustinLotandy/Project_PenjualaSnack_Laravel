<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class Profitperbulan extends ChartWidget
{
    protected static ?string $heading = 'Pertumbuhan Penjualan Bulanan';

    protected function getData(): array
    {
        // Mengambil data penjualan per bulan dari database
        $data = DB::table('transaksis')
            ->select(
                DB::raw("DATE_FORMAT(Date, '%Y-%m') as bulan"),
                DB::raw("SUM(Total) as total_penjualan")
            )
            ->groupBy(DB::raw("DATE_FORMAT(Date, '%Y-%m')"))
            ->orderBy('bulan', 'asc')
            ->get();

        // Variabel untuk menyusun data grafik
        $bulanList = [];
        $growthList = [];
        $prevPenjualan = null; // Menyimpan penjualan bulan sebelumnya

        foreach ($data as $row) {
            $bulanList[] = $row->bulan; // Menambahkan bulan ke daftar
            if ($prevPenjualan === null) {
                // Jika tidak ada bulan sebelumnya, pertumbuhan dianggap 0
                $growthList[] = 0;
            } else {
                // Menghitung pertumbuhan penjualan
                $growth = (($row->total_penjualan - $prevPenjualan) / $prevPenjualan) * 100;
                $growthList[] = round($growth, 2); // Membulatkan ke 2 desimal
            }
            $prevPenjualan = $row->total_penjualan; // Menyimpan total penjualan bulan ini
        }

        // Menyusun data untuk grafik
        return [
            'labels' => $bulanList, // Bulan sebagai label sumbu X
            'datasets' => [
                [
                    'label' => 'Pertumbuhan Penjualan (%)',
                    'data' => $growthList, // Data pertumbuhan penjualan
                    'backgroundColor' => '#FF5733', // Warna tetap
                    'borderColor' => '#C70039', // Warna garis
                    'borderWidth' => 2, // Lebar garis pada grafik
                ],
            ],
            'options' => [
                'responsive' => true, // Membuat grafik responsif
                'maintainAspectRatio' => false, // Memastikan grafik dapat menyesuaikan ukuran
            ],
        ];
    }

    protected function getType(): string
    {
        // Ubah jenis grafik menjadi 'line' untuk tren pertumbuhan
        return 'line';
    }
}
