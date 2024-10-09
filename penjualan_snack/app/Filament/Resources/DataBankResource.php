<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataBankResource\Pages;
use App\Filament\Resources\DataBankResource\RelationManagers;
use App\Models\DataBank;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataBankResource extends Resource
{
    protected static ?string $model = DataBank::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel():string{
        return'Data Bank';
    }

    public static function getPluralModelLabel():string{
        return 'Data Bank';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            
                Forms\components\TextInput::make('nama')
                ->label("Nama")
                ->required()
                ->maxLength(20),
                
                Forms\components\TextInput::make('norek')
                ->label("Norek")
                ->required()
                ->maxLength(16),
            

                Forms\Components\FileUpload::make('file') 
                ->label('File')
                ->image() 
                ->required() 
                ->disk('public')
                ->directory('product-images')
                ->visibility('public'), 

                Forms\components\DateTimePicker::make('created_at')
                ->label("CreatedAt")
                ->required(),
                

                Forms\components\TextInput::make('created_by')
                ->label("CreatedBy")
                ->required()
                ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('norek')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('file')->label('Gambar Produk')->formatStateUsing(function (string $state) {
        return basename($state); 
    })          ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_by')->sortable()->searchable(),
                
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
            'index' => Pages\ListDataBanks::route('/'),
            'create' => Pages\CreateDataBank::route('/create'),
            'edit' => Pages\EditDataBank::route('/{record}/edit'),
        ];
    }
}
