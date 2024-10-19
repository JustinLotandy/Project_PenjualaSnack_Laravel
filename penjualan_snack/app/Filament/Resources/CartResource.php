<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartResource\Pages;
use App\Filament\Resources\CartResource\RelationManagers;
use App\Models\Cart;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getModelLabel():string{
        return 'Keranjang';
    }

    public static function getPluralModelLabel():string{
        return'Keranjang';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Forms\components\TextInput::make('kode_cart')
                ->label("Kode Cart")
                ->required()
                ->maxLength(20),

                Forms\components\TextInput::make('Kode_pengguna')
                ->label("Kode pengguna")
                ->required()
                ->maxLength(20),

                Forms\components\TextInput::make('Product_id')
                ->label("ID Product")
                ->required()
                ->maxLength(20),

                Forms\components\TextInput::make('QTY')
                ->label("Kuantitas")
                ->required()
                ->maxLength(255),
                
                Forms\components\TextInput::make('Desc')
                ->label("Deskripsi")
                ->required()
                ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_cart')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_pengguna')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Product_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('QTY')->label('Kuantitas')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Desc')->label('Deskripsi')->sortable()->searchable(),
                
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
            'index' => Pages\ListCarts::route('/'),
            'create' => Pages\CreateCart::route('/create'),
            'edit' => Pages\EditCart::route('/{record}/edit'),
        ];
    }
}
