<?php

namespace App\Filament\Resources\CartResource\Pages;

use App\Filament\Resources\CartResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\pdf;

class ListCarts extends ListRecords
{
    protected static string $resource = CartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak_laporan')
            ->label('Cetak Laporan')
            ->icon('heroicon-o-printer')
            ->action(fn() => static::cetakLaporan())
            ->requiresConfirmation()
            ->modalHeading('Cetak Laporan Cart')
            ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    public static function cetakLaporan()
    {
    // Ambil data pengguna
    $data = \App\Models\Cart::all();
    // Load view untuk cetak PDF
    $pdf = PDF::loadView('laporan.cetakcart', ['data' => $data]);
    // Unduh file PDF
    return response()->streamDownload(fn() => print($pdf->output()), 'laporan_Cart.pdf');
    }
}
