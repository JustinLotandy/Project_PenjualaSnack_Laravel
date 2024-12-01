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
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Imports\KategoriImport;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Produk';


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
                
                Forms\Components\TextInput::make('kode_kategori')
                ->label("Kode Kategori")
                ->required()
                ->default('KTR-')
                ->placeholder(function () {
                    $lastKode = Kategori::query()
                        ->whereNotNull('kode_kategori')
                        ->latest('kode_kategori')
                        ->value('kode_kategori');
            
                    return $lastKode ? "Last Code: $lastKode" : 'No previous code';
                })
                ->hint(function () {
                    $lastKode = Kategori::query()
                        ->whereNotNull('kode_kategori')
                        ->latest('kode_kategori')
                        ->value('kode_kategori');
            
                    return $lastKode ? "Kode terakhir: $lastKode" : 'Belum ada kode kategori sebelumnya';
                })
                ->maxLength(100),

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
                Tables\Columns\TextColumn::make('kode_kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Nama_kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('View_count')->sortable()->searchable(),
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
                        Excel::import(new KategoriImport, $filePath);

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
                    ->modalHeading('Import Data Kategori')
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}
