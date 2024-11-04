<?php

namespace App\Filament\Resources\DataBankResource\Pages;

use App\Filament\Resources\DataBankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\pdf;

class ListDataBanks extends ListRecords
{
    protected static string $resource = DataBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporan')
            ->label('Cetak Laporan')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Data Bank')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    public static function cetakLaporan()
    {
    // Ambil data pengguna
    $data = \App\Models\DataBank::all();
    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.cetakdatabank', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_Databank.pdf');
    }

    
}
