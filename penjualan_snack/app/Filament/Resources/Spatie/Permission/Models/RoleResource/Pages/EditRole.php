<?php

namespace App\Filament\Resources\Spatie\Permission\Models\RoleResource\Pages;

use App\Filament\Resources\Spatie\Permission\Models\RoleResource;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;
}
