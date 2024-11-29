<?php

namespace App\Filament\Resources\ApprovalResource\Pages;

use App\Filament\Resources\ApprovalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListApprovals extends ListRecords
{
    protected static string $resource = ApprovalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
{
    return [
        'all' => Tab::make(),
        'Pending' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('Status', 'Pending')),
        'Approved' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('Status', "Approved"))
    ];
}
}
