<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenggunaResource\Pages;
use App\Filament\Resources\PenggunaResource\RelationManagers;
use App\Models\Pengguna;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenggunaResource extends Resource
{
    protected static ?string $model = Pengguna::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Pengguna'; 
    }

    // Override plural label
    public static function getPluralModelLabel(): string
    {
        return 'Pengguna'; 
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                

                Forms\components\TextInput::make('Username')
                ->label("Username")
                ->required()
                ->maxLength(1000),

                Forms\components\TextInput::make('password')
                ->label("Pasword")
                ->required()
                ->maxLength(500),

                Forms\components\TextInput::make('Role')
                ->label("Role")
                ->required()
                ->maxLength(200),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Username')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('password') ->label('password')  
                ->formatStateUsing(fn ($state) => '*****')  
                ->sortable()->searchable(),
            Tables\Columns\TextColumn::make('Role')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Role')->sortable()->searchable(),
               
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
            'index' => Pages\ListPenggunas::route('/'),
            'create' => Pages\CreatePengguna::route('/create'),
            'edit' => Pages\EditPengguna::route('/{record}/edit'),
        ];
    }
}
