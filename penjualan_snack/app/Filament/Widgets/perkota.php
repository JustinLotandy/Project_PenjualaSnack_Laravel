<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class perkota extends ChartWidget
{
    protected static ?string $heading = 'Persentase Penjualan per Kota';
    protected static ?string $maxHeight = '300px';
    protected function getData(): array
    {
        // Mengambil total penjualan per kota dari database
        $data = DB::table('transaksis')
            ->select(
                'Kota',
                DB::raw("SUM(Total) as total_penjualan")
            )
            ->groupBy('Kota')
            ->orderBy('total_penjualan', 'desc')
            ->get();

        // Variabel untuk menyusun data grafik
        $kotaList = [];
        $totalPenjualanList = [];
        $colorList = [];

        $generateColor = function ($string) {
            $hash = md5($string);
            return '#' . substr($hash, 0, 6);
        };

        foreach ($data as $row) {
            $kotaList[] = $row->Kota; // Menambahkan nama kota
            $totalPenjualanList[] = $row->total_penjualan; // Total penjualan kota
            $colorList[] = $generateColor($row->Kota); // Warna unik untuk setiap kota
        }

        // Menyusun data untuk pie chart
        return [
            'labels' => $kotaList, // Kota sebagai label
            'datasets' => [
                [
                    'data' => $totalPenjualanList, // Total penjualan sebagai data
                    'backgroundColor' => $colorList, // Warna unik untuk setiap kota
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
        // Mengatur jenis grafik menjadi 'pie'
        return 'pie';
    }
}