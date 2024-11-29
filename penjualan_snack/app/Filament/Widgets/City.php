<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class City extends ChartWidget
{
    protected static ?string $heading = 'Penjualan Berdasarkan Kota';

    protected function getType(): string
    {
        return 'bar'; // Menggunakan bar chart untuk data kota
    }

    protected function getData(): array
    {
        // Query untuk menghitung total penjualan berdasarkan kota
        $penjualanPerKota = DB::table('transaksis')
            ->select('Kota', DB::raw('SUM(Total) as total_penjualan'))
            ->groupBy('Kota')
            ->orderBy('total_penjualan', 'desc') // Mengurutkan berdasarkan total penjualan
            ->get();

        // Konversi data untuk Chart.js
        $labels = $penjualanPerKota->pluck('Kota')->toArray(); // Nama kota
        $data = $penjualanPerKota->pluck('total_penjualan')->toArray(); // Total penjualan

        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)', // Warna bar
                    'borderColor' => 'rgba(54, 162, 235, 1)', // Warna garis bar
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels, // Label untuk sumbu X (nama kota)
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false, // Pastikan chart mengikuti ukuran container
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top', // Posisi legenda
                ],
            ],
            'scales' => [
                'x' => [
                    'grid' => [
                        'display' => false, // Hilangkan grid pada sumbu X
                    ],
                ],
                'y' => [
                    'grid' => [
                        'display' => true, // Tampilkan grid pada sumbu Y
                    ],
                ],
            ],
        ];
    }
}
