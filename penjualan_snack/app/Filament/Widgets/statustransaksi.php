<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class statustransaksi extends ChartWidget
{
    protected static ?string $heading = 'Transaksi Berdasarkan Status';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Mengambil data jumlah transaksi per status dari database
        $data = DB::table('transaksis')
            ->select(
                'Status',
                DB::raw('COUNT(*) as jumlah_transaksi') // Menghitung jumlah transaksi per status
            )
            ->groupBy('Status')
            ->orderBy('jumlah_transaksi', 'desc')
            ->get();

        // Menyusun data untuk grafik
        $statusList = [];
        $jumlahList = [];
        $colorList = [];

        // Fungsi untuk menghasilkan warna unik berdasarkan status
        $generateColor = function ($string) {
            $hash = md5($string);
            return '#' . substr($hash, 0, 6);
        };

        foreach ($data as $row) {
            $statusList[] = $row->Status; // Nama status
            $jumlahList[] = $row->jumlah_transaksi; // Jumlah transaksi
            $colorList[] = $generateColor($row->Status); // Warna unik per status
        }

        // Menyusun data untuk grafik pie chart
        return [
            'labels' => $statusList, // Status sebagai label
            'datasets' => [
                [
                    'data' => $jumlahList, // Jumlah transaksi per status
                    'backgroundColor' => $colorList, // Warna unik untuk setiap status
                ],
            ],
            'options' => [
                'responsive' => true, // Membuat grafik responsif
                'maintainAspectRatio' => false, // Memastikan grafik dapat menyesuaikan ukuran
                'plugins' => [
                    'legend' => [
                        'position' => 'top', // Menempatkan legend di atas
                    ],
                    'title' => [
                        'display' => true,
                        'text' => 'Transaksi Berdasarkan Status', // Judul grafik
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        // Mengatur jenis grafik menjadi 'pie'
        return 'pie';
    }
}
