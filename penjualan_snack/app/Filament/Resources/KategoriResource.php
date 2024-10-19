<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Kategori';
    }

    // Override plural label
    public static function getPluralModelLabel(): string
    {
        return 'Kategori'; 
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\components\TextInput::make('kode_kategori')
                ->label("Kode Kategori")
                ->required()
                ->maxLength(1000),

                Forms\components\TextInput::make('Nama_kategori')
                ->label("Nama Kategori")
                ->required()
                ->maxLength(1000),

                Forms\components\TextInput::make('View_count')
                ->label("View Count")
                ->required()
                ->maxLength(11),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nama_kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('View_count')->sortable()->searchable(),
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}
