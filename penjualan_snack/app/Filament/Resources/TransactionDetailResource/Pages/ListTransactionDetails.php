<?php

namespace App\Filament\Resources\TransactionDetailResource\Pages;

use App\Filament\Resources\TransactionDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\pdf;

class ListTransactionDetails extends ListRecords
{
    protected static string $resource = TransactionDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->action(fn() => static::cetakLaporan())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Transaction Detail')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }
    public static function cetakLaporan()
    {
    // Ambil data pengguna
    $data = \App\Models\TransactionDetail::all();
    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.cetaktransaksidetail', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_transaksidetail.pdf');
    }
}
