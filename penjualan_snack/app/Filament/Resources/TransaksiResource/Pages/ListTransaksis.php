<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\pdf;

class ListTransaksis extends ListRecords
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporan())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Transaksi')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

                Actions\Action::make('Laporan Penjualan Produk Per Bulan')
                ->label('Laporan Penjualan Produk Per Bulan')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::LaporanTransaksiPERBLN())
                ->requiresConfirmation()
                ->modalHeading('Laporan Penjualan Produk Per Bulan')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

                Actions\Action::make('Laporan Penjualan Berdasarkan Kota')
                ->label('Laporan Penjualan Berdasarkan Kota')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporanperkota())
                ->requiresConfirmation()
                ->modalHeading('Laporan Penjualan Berdasarkan Kota')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

                Actions\Action::make('Laporan Penjualan Berdasarkan Kategori')
                ->label('Laporan Penjualan Berdasarkan Kategori')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::kategoripenjualan())
                ->requiresConfirmation()
                ->modalHeading('Laporan Penjualan Berdasarkan Kategori')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }
    public static function cetakLaporan()
    {
    // Ambil data pengguna
    $data = \App\Models\Transaksi::all();
    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.cetaktransaksi', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_Transaksi.pdf');
    }

    public static function LaporanTransaksiPERBLN()
{
    // Ambil data transaksi dengan query yang telah diringkas
    $data = \DB::table('transaksis as t')
        ->selectRaw('
            MONTH(t.Date) AS bulan, 
            p.nama_produk, 
            COUNT(td.kode_transaction_detail) AS jumlah_transaksi, 
            SUM(td.QTY) AS total_qty, 
            SUM(td.QTY * td.Price) AS total_penjualan
        ')
        ->join('transaction_details as td', 't.kode_transaksi', '=', 'td.kode_transaksi')
        ->join('produks as p', 'td.kode_product', '=', 'p.kode_produk')
        ->groupByRaw('MONTH(t.Date), p.nama_produk')
        ->orderByRaw('bulan, p.nama_produk')
        ->get();

    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.Laporanpenjualanpbln', ['data' => $data]);

    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'Laporan Penjualan Produk Per Bulan.pdf');
}
public static function cetakLaporanperkota()
{
    // Ambil data transaksi dengan query yang telah diringkas
    $data = \DB::table('transaksis as t')
        ->selectRaw('
            t.Kota,
            p.nama_produk, 
            COUNT(td.kode_transaction_detail) AS jumlah_transaksi, 
            SUM(td.QTY) AS total_qty, 
            SUM(td.QTY * td.Price) AS total_penjualan
        ')
        ->join('transaction_details as td', 't.kode_transaksi', '=', 'td.kode_transaksi')
        ->join('produks as p', 'td.kode_product', '=', 'p.kode_produk')
        ->groupByRaw('t.Kota, p.nama_produk')
        ->orderByRaw('total_penjualan DESC')
        ->get();

    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.penjualanperkota', ['data' => $data]);

    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'Laporan Penjualan Berdasarkan Kota.pdf');
}

public static function kategoripenjualan()
{
    // Ambil data transaksi berdasarkan kategori
    $data = \DB::table('kategoris as k')
    ->selectRaw('
        k.Nama_kategori AS kategori,
        p.kode_produk,
        p.nama_produk,
        SUM(td.QTY * td.Price) AS total_penjualan_kategori
    ')
    ->join('produks as p', 'p.kategori', '=', 'k.kode_kategori')
    ->join('transaction_details as td', 'td.kode_product', '=', 'p.kode_produk')
    ->join('transaksis as t', 't.kode_transaksi', '=', 'td.kode_transaksi')
    ->groupBy('k.Nama_kategori', 'p.kode_produk', 'p.nama_produk') // Tambahkan p.nama_produk di sini
    ->orderBy('k.Nama_kategori')
    ->orderBy('p.kode_produk')
    ->get();


// Load view untuk cetak PDF
$pdf = PDF::loadView('laporan.PenjualanKategori', ['data' => $data]);

// Unduh file PDF
return response()->streamDownload(fn() => print($pdf->output()), 'Laporan_Penjualan_Berdasarkan_Kategori.pdf');



}
}