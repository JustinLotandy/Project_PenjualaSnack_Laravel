<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class Penjualanbln extends ChartWidget
{
    protected static ?string $heading = 'Penjualan Per Bulan';

    protected function getType(): string
    {
        return 'bar'; // Tipe chart (line chart)
    }

    protected function getData(): array
    {
        // Query untuk menghitung penjualan per bulan
        $penjualanPerBulan = DB::table('transaksis')
            ->selectRaw("DATE_FORMAT(Date, '%Y-%m') as bulan, SUM(Total) as total_penjualan")
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        // Konversi data untuk Chart.js
        $labels = $penjualanPerBulan->pluck('bulan')->toArray();
        $data = $penjualanPerBulan->pluck('total_penjualan')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan',
                    'data' => $data,
                    'borderColor' => '#f59e0b', // Warna garis
                    'backgroundColor' => 'rgba(245, 158, 11, 0.5)', // Warna area di bawah garis
                    'fill' => true,
                ],
            ],
            'labels' => $labels, // Label untuk sumbu X (bulan)
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
