<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionDetailResource\Pages;
use App\Filament\Resources\TransactionDetailResource\RelationManagers;
use App\Models\TransactionDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionDetailResource extends Resource
{
    protected static ?string $model = TransactionDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Detail Transaksi'; 
    }

    // Override plural label
    public static function getPluralModelLabel(): string
    {
        return 'Detail Transaksi'; 
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Forms\components\TextInput::make('kode_transaction_detail')
            ->label("kode_transaction_detail")
            ->required()
            ->maxLength(11),

            Forms\components\TextInput::make('kode_product')
            ->label("ID Produk")
            ->required()
            ->maxLength(11),
            
            Forms\components\TextInput::make('kode_transaksi')
            ->label("Transaction Number")
            ->required()
            ->maxLength(225),

            Forms\components\TextInput::make('Qty')
            ->label("Kuantitas")
            ->required()
            ->maxLength(11),

            Forms\components\TextInput::make('Price')
            ->label("Price")
            ->required()
            ->maxLength(11),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_transaction_detail')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_product')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_transaksi')->label('Nomor Transaksi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Qty')->label('Kuantitas')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Price')->sortable()->searchable(),
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
            'index' => Pages\ListTransactionDetails::route('/'),
            'create' => Pages\CreateTransactionDetail::route('/create'),
            'edit' => Pages\EditTransactionDetail::route('/{record}/edit'),
        ];
    }
}
