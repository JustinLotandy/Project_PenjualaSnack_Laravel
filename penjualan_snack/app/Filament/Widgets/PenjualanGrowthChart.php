<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;



class PenjualanGrowthChart extends ChartWidget
{
    protected static ?string $heading = 'Pertumbuhan Penjualan Bulanan Berdasarkan Produk';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Mengambil data transaksi dari database
        $data = DB::table('transaksis')
            ->select(
                'nama_produk',
                DB::raw("DATE_FORMAT(Date, '%Y-%m') as bulan"),
                DB::raw("SUM(Total) as total")
            )
            ->groupBy('nama_produk', DB::raw("DATE_FORMAT(Date, '%Y-%m')"))
            ->orderBy('bulan', 'asc')
            ->get();

        // Variabel untuk menyusun data grafik
        $produkList = [];
        $bulanList = [];
        $dataProduk = [];

        foreach ($data as $row) {
            if (!in_array($row->bulan, $bulanList)) {
                $bulanList[] = $row->bulan; // Menambahkan bulan unik
            }
            $produkList[$row->nama_produk][$row->bulan] = $row->total; // Data penjualan per produk
        }

        // Fungsi untuk menghasilkan warna tetap berdasarkan nama produk
        $generateColor = function ($string) {
            $hash = md5($string); // Hash nama produk
            return '#' . substr($hash, 0, 6); // Menggunakan 6 karakter pertama sebagai kode warna
        };

        // Menyusun data untuk setiap produk
        $datasets = [];
        foreach ($produkList as $produk => $values) {
            $datasets[] = [
                'label' => $produk, // Nama produk
                'data' => array_values(array_replace(array_fill_keys($bulanList, 0), $values)), // Data total penjualan per bulan
                'backgroundColor' => $generateColor($produk), // Warna tetap berdasarkan nama produk
            ];
        }

        // Mengembalikan data untuk grafik
        return [
            'labels' => $bulanList, // Bulan sebagai label sumbu X
            'datasets' => $datasets, // Data total penjualan berdasarkan produk
            'options' => [
                'responsive' => true, // Membuat grafik responsif
                'maintainAspectRatio' => false, // Memastikan grafik dapat menyesuaikan ukuran
            ],
        ];
    }

    protected function getType(): string
    {
        // Ubah jenis grafik menjadi 'bar' untuk tampilan lebih baik
        return 'bar';
    }
}
