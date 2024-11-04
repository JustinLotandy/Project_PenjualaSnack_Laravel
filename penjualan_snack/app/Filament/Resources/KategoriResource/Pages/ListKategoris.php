<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\pdf;

class ListKategoris extends ListRecords
{
    protected static string $resource = KategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporan')
            ->label('Cetak Laporan')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Kategori')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];

        
    }

    public static function cetakLaporan()
    {
    // Ambil data pengguna
    $data = \App\Models\kategori::all();
    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.cetakkategori', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_kategori.pdf');
    }
}
