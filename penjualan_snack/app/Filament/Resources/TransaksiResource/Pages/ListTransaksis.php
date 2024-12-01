<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\pdf;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

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

            Actions\Action::make('cetak_laporan_TRKPerBLN')
                ->label('Cetak Laporan Transaksi Perbulan')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporanPerbulan())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Transaksi')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

            Actions\Action::make('cetak_laporan_perkota')
                ->label('Cetak Laporan Transaksi berdasarkan kota')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporapenjualanperkota())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Transaksi')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),

            Actions\Action::make('cetak_laporan_perkategori')
                ->label('Cetak Laporan Transaksi berdasarkan kategori')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporanPenjualanPerKategori())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Transaksi')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan berdasarkan kota?'),

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

    public static function cetakLaporanPerbulan()
    {
        $data = \DB::table('transaksis as t')
        ->selectRaw('
            t.Date AS tanggal_transaksi,
            t.kode_transaksi,
            p.kode_produk,
            p.Nama_produk AS nama_produk,
            p.Harga AS harga_per_barang,
            t.QTY,
            (t.QTY * p.Harga) AS total
        ')
        ->join('produks as p', 't.nama_produk', '=', 'p.Nama_produk') // Relasi ke tabel produk
        ->join('approvals as a', 't.kode_transaksi', '=', 'a.kode_transaksi') // Relasi ke tabel approval
        ->where('t.status_approval', 'Approved') // Transaksi approved
        ->where('a.Status', 'Approved') // Approval approved
        ->orderBy('t.Date', 'ASC') // Urutkan berdasarkan tanggal transaksi
        ->get();
    
    
        // Tambahkan log untuk memeriksa data
        \Log::info('Data untuk laporan penjualan per bulan:', $data->toArray());
    
        $totalPerbulan = $data->sum('total_harga');
    
        $pdf = PDF::loadView('laporan.Laporanpenjualanpbln', compact('data', 'totalPerbulan'))
                  ->setPaper('a4', 'portrait');
    
        $filename = 'Laporan_Perbulan_' . now()->format('Ymd_His') . '.pdf';
    
        return response()->streamDownload(
            fn() => print($pdf->output()),
            $filename,
            ['Content-Type' => 'application/pdf']
        );
    }
    
    public static function cetakLaporapenjualanperkota()
    {
    $data = \DB::table('transaksis as t')
        ->selectRaw('
            t.Kota AS nama_kota,
            t.Date AS tanggal_transaksi,
            t.kode_transaksi,
            p.Nama_produk AS nama_produk,
            p.Harga AS harga_per_barang,
            t.QTY,
            (t.QTY * p.Harga) AS total
        ')
        ->join('produks as p', 't.nama_produk', '=', 'p.Nama_produk') // Relasi ke tabel produk
        ->join('approvals as a', 't.kode_transaksi', '=', 'a.kode_transaksi') // Relasi ke tabel approval
        ->where('t.status_approval', 'Approved') // Transaksi approved
        ->where('a.Status', 'Approved') // Approval approved
        ->orderBy('t.Kota') // Urutkan berdasarkan kota
        ->orderBy('t.Date', 'ASC') // Urutkan berdasarkan tanggal transaksi
        ->get();

    // Kelompokkan data berdasarkan kota
    $dataPerKota = $data->groupBy('nama_kota');

    $pdf = PDF::loadView('laporan.Penjualanperkota', compact('dataPerKota'))
              ->setPaper('a4', 'portrait');

    $filename = 'Laporan_Penjualan_Per_Kota' . now()->format('Ymd_His') . '.pdf';

    return response()->streamDownload(
        fn() => print($pdf->output()),
        $filename,
        ['Content-Type' => 'application/pdf']
    );
    }

    public static function cetakLaporanPenjualanPerKategori()
    {
        $data = \DB::table('transaksis as t')
            ->selectRaw('
                k.Nama_kategori AS nama_kategori,
                t.Date AS tanggal_transaksi,
                t.kode_transaksi,
                p.Nama_produk AS nama_produk,
                p.Harga AS harga_per_barang,
                t.QTY,
                (t.QTY * p.Harga) AS total
            ')
            ->join('produks as p', 't.nama_produk', '=', 'p.Nama_produk') // Relasi ke tabel produk
            ->join('kategoris as k', 'p.kategori', '=', 'k.kode_kategori') // Relasi ke tabel kategori
            ->join('approvals as a', 't.kode_transaksi', '=', 'a.kode_transaksi') // Relasi ke tabel approval
            ->where('t.status_approval', 'Approved') // Transaksi approved
            ->where('a.Status', 'Approved') // Approval approved
            ->orderBy('k.Nama_kategori') // Urutkan berdasarkan kategori
            ->orderBy('t.Date', 'ASC') // Urutkan berdasarkan tanggal transaksi
            ->get();
    
        // Kelompokkan data berdasarkan kategori
        $dataPerKategori = $data->groupBy('nama_kategori');
    
        $pdf = PDF::loadView('laporan.PenjualanKategori', compact('dataPerKategori'))
                  ->setPaper('a4', 'portrait');
    
        $filename = 'Laporan_Penjualan_Per_Kategori_' . now()->format('Ymd_His') . '.pdf';
    
        return response()->streamDownload(
            fn() => print($pdf->output()),
            $filename,
            ['Content-Type' => 'application/pdf']
        );
    }

public function getTabs(): array
{
    return [
        'all' => Tab::make(),
        'Pending' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status_approval', 'Pending')),
        'Approved' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('status_approval', "Approved"))
    ];
}
}