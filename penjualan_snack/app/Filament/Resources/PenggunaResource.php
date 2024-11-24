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
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Imports\penggunaImport;

class PenggunaResource extends Resource
{
    protected static ?string $model = Pengguna::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Data Dan Pengguna';

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
                Forms\components\TextInput::make('kode_pengguna')
                ->label("User ID")
                ->required()
                ->maxLength(1000),

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
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('importExcel')
                    ->label('Import Excel')
                    ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new penggunaImport, $filePath);

                        Notification::make()
                            ->title('Data berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel')
                            ->disk('public')
                            ->directory('imports')
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'])
                            ->required(),
                    ])
                    ->modalHeading('Import Data Pengguna')
                    ->modalButton('Import')
                    ->color('success'),
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
