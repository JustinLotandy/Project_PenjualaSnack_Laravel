<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Imports\ProdukImport;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;




class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Produk';

    public static function getModelLabel(): string
    {
        return 'Produk';
    }

    // Override plural label
    public static function getPluralModelLabel(): string
    {
        return 'Produk';
    }

    
   
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\components\TextInput::make('kode_produk')
                ->label("Kode Produk")
                ->required()
                ->maxLength(11),

                Select::make('Userid')
                ->label('Kode Pengguna')
                ->options(function () {
                    // Ambil Userid sebagai key dan tampilkan hanya Userid di dropdown
                    return \App\Models\Pengguna::pluck('Kode_pengguna', 'Kode_pengguna');
                })
                ->reactive() // Aktifkan reaktivitas untuk mendeteksi perubahan
                ->afterStateUpdated(function (callable $set, $state) {
                    // Cari Username berdasarkan Userid yang dipilih
                    $user = \App\Models\pengguna::where('Kode_pengguna', $state)->first();
                    $set('Created_by', $user ? $user->Username : null);
                })  
                ->required(),
                
                
                Select::make('Kategori')
                ->label('Kode Kategori')
                ->options(function () {
                    // Menampilkan hanya kode_kategori di dropdown
                    return \App\Models\Kategori::pluck('kode_kategori', 'kode_kategori');
                })
                ->reactive() // Agar perubahan langsung memicu event
                ->afterStateUpdated(function (callable $set, $state) {
                    // Ambil Nama_kategori berdasarkan kode_kategori yang dipilih
                    $kategori = \App\Models\Kategori::where('kode_kategori', $state)->first();
                    $set('Deskirpsi', $kategori ? $kategori->Nama_kategori : null);
                })
                ->required(),

                Forms\components\TextInput::make('Isi')
                ->label("Isi")
                ->required()
                ->maxLength(255),

                Forms\components\TextInput::make('Ukuran')
                ->label("Ukuran")
                ->required()
                ->maxLength(255),

                Forms\components\TextInput::make('Expired')
                ->label("Expired")
                ->required()
                ->maxLength(255),

                Forms\components\TextInput::make('Berat')
                ->label("Berat")
                ->required()
                ->maxLength(11),

                Forms\components\TextInput::make('Deskirpsi')
                ->label('Deskripsi')
                ->required(),
                
                // Forms\components\TextInput::make('Deskirpsi')
                // ->label("Deskripsi")
                // ->required()
                // ->maxLength(225),
                
                Forms\components\TextInput::make('Nama_produk')
                ->label("Nama")
                ->required()
                ->maxLength(225),

                FileUpload::make('file')
                    ->label('Upload File')
                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                    ->directory('uploads/images') 
                    ->visibility('public') 
                    ->required(), 

                Forms\components\DateTimePicker::make('Created_at')
                ->label("Created At")
                ->required(),

                Forms\components\TextInput::make('Created_by')
                ->label('Created By')
                // ->disabled() // Kolom ini hanya untuk ditampilkan, tidak bisa diubah oleh user
                ->required(),
                // Forms\components\TextInput::make('Created_by')
                // ->label("Created By")
                // ->required()
                // ->maxLength(225),

                Forms\components\TextInput::make('Stok')
                ->label("Stok")
                ->required()
                ->maxLength(225),

                Forms\components\TextInput::make('Harga')
                ->label("Harga")
                ->required()
                ->maxLength(225),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Created_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_produk')->sortable()->searchable(),
                ImageColumn::make('file') 
                ->width(100)
                ->disk('public') 
                ->url(fn($record) => Storage::disk('public')->url($record->image)),
                Tables\Columns\TextColumn::make('Userid')->label('User ID')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Kategori')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Isi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Ukuran')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Expired')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Berat')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Deskirpsi')->label('Deskripsi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Nama_produk')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Created_by')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Stok')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Harga')->sortable()->searchable(),
                
                

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
                        Excel::import(new ProdukImport, $filePath);

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
                    ->modalHeading('Import Data Produk')
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }

}
