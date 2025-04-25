<?php

namespace App\Filament\Resources\Spatie\Permission\Models;

use App\Filament\Resources\Spatie\Permission\Models\RoleResource\Pages;
use App\Filament\Resources\Spatie\Permission\Models\RoleResource\RelationManagers;
use Spatie\Permission\Models\Role; // <- ini juga kamu salah, harusnya pakai Spatie\ langsung
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;
    // protected static ?string $model = \Spatie\Permission\Models\Role::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Tambahkan field di sini
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tambahkan kolom di sini
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
