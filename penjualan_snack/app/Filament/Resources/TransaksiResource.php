<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\RelationManagers;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Transaksi'; 
    }

    // Override plural label
    public static function getPluralModelLabel(): string
    {
        return 'Transaksi'; 
    }
    public static function form(Form $form): Form
    {
        return $form
        ->schema([

            Forms\components\TextInput::make('kode_transaksi')
            ->label("Kode Transaksi")
            ->required()
            ->maxLength(11),
            
            Forms\components\TextInput::make('kode_pengguna')
            ->label("User ID")
            ->required()
            ->maxLength(11),

            Forms\components\TextInput::make('kode_databank')
            ->label("Kode Data Bank")
            ->required()
            ->maxLength(225),
            
            Forms\components\TextInput::make('Transactionnumber')
            ->label("Transaction Number")
            ->required()
            ->maxLength(225),

            Forms\components\TextInput::make('Total_berat')
            ->label("Total Berat")
            ->required()
            ->maxLength(255),

            Forms\components\TextInput::make('nama_produk')
            ->label("Nama Produk")
            ->required()
            ->maxLength(11),

            Forms\components\TextInput::make('Phone')
            ->label("Phone")
            ->required()
            ->maxLength(255),

            Forms\components\TextInput::make('No-resi')
            ->label("No resi")
            ->required()
            ->maxLength(255),

            Forms\components\TextInput::make('Kurir')
            ->label("Kurir")
            ->required()
            ->maxLength(11),
            
            Forms\components\TextInput::make('Kota')
            ->label("Kota")
            ->required()
            ->maxLength(225),
            
            Forms\components\TextInput::make('Ongkir')
            ->label("Ongkir")
            ->required()
            ->maxLength(225),

            Forms\components\TextInput::make('Total')
            ->label("Total")
            ->required()
            ->maxLength(225),

            Forms\components\TextInput::make('Bukit_tansaksi')
            ->label("Bukti Transaksi")
            ->required()
            ->maxLength(225),

            Forms\components\TextInput::make('Status')
            ->label("Status")
            ->required()
            ->maxLength(225),

            Forms\components\DateTimePicker::make('Date')
            ->label("Date")
            ->required()
            ,

            Forms\components\TextInput::make('Adress')
            ->label("Adress")
            ->required()
            ->maxLength(225),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_pengguna')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_databank')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Transactionnumber')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Total_berat')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Phone')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('No-resi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Kurir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Kota')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Ongkir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Total')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Bukit_tansaksi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Status')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Date')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Adress')->sortable()->searchable(),
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
