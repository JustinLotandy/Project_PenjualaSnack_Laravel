<?php

namespace App\Filament\Resources\DataBankResource\Pages;

use App\Filament\Resources\DataBankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataBank extends EditRecord
{
    protected static string $resource = DataBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
