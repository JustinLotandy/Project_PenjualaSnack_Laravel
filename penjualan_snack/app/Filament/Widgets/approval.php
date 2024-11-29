<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class approval extends ChartWidget
{
    protected static ?string $heading = 'Status Transaksi';

    protected function getType(): string
    {
        return 'pie'; // Tipe chart: Pie Chart
    }

    protected function getData(): array
    {
        // Query untuk menghitung jumlah transaksi berdasarkan status
        $statusData = DB::table('transaksis')
            ->select('status_approval', DB::raw('COUNT(*) as total'))
            ->groupBy('status_approval')
            ->get();

        // Konversi data untuk Chart.js
        $labels = $statusData->pluck('status_approval')->toArray(); // Status (Pending, Approval, dll.)
        $data = $statusData->pluck('total')->toArray(); // Total untuk setiap status

        return [
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => ['#f59e0b', '#10b981'], // Warna untuk setiap segmen (Pending, Approval)
                    'hoverBackgroundColor' => ['#fbbf24', '#34d399'], // Warna ketika di-hover
                ],
            ],
            'labels' => $labels, // Label (Pending, Approval)
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false, // Pastikan chart sesuai dengan ukuran container
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom', // Posisi legenda di bawah chart
                ],
            ],
        ];
    }
}
