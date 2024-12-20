<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartResource\Pages;
use App\Filament\Resources\CartResource\RelationManagers;
use App\Models\Cart;
use App\Imports\CartImport;
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
use Filament\Forms\Components\Select;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Transaksi';
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
                
                Forms\Components\TextInput::make('kode_cart')
                ->label('Kode Cart')
                ->required()
                ->default('CART-') // Default prefix untuk kode_cart
                ->placeholder(function () {
                    $lastKode = Cart::query()
                        ->whereNotNull('kode_cart')
                        ->latest('kode_cart')
                        ->value('kode_cart');

                         return $lastKode ? "Last Code: $lastKode" : 'No previous code';
                })
                ->hint(function () {
                    $lastKode = Cart::query()
                        ->whereNotNull('kode_cart')
                        ->latest('kode_cart')
                        ->value('kode_cart');

                    return $lastKode ? "Kode terakhir: $lastKode" : 'Belum ada kode cart sebelumnya';
                 })
                ->maxLength(20),
                

                Select::make('kode_pengguna')
                ->label('Kode Pengguna')
                ->options(function () {
                    // Membuat dropdown dengan opsi "kode_pengguna - Username"
                 return \App\Models\Pengguna::all()->mapWithKeys(function ($pengguna) {
                     return [$pengguna->kode_pengguna => "{$pengguna->kode_pengguna} - {$pengguna->Username}"];
                    });
                })
                ->reactive() // Memastikan dropdown reaktif
                ->afterStateUpdated(function (callable $set, $state) {
                    // Mengisi kolom nama_pengguna otomatis berdasarkan kode_pengguna
                    $pengguna = \App\Models\Pengguna::where('kode_pengguna', $state)->first();
                    $set('nama_pengguna', $pengguna ? $pengguna->Username : null);
                })
                ->searchable() // Menambahkan fitur pencarian
                ->required(),

                Forms\components\TextInput::make('nama_pengguna')
                ->label("nama_pengguna")
                ->required()
                ->maxLength(20),

                Select::make('kode_customer')
    ->label('Kode Customer')
    ->options(function () {
        // Menampilkan hanya kode_customer di dropdown
        return \App\Models\Customer::pluck('kode_customer', 'kode_customer');
    })
    ->reactive() // Agar perubahan langsung memicu event
    ->afterStateUpdated(function (callable $set, $state) {
        // Ambil Nama_customer dan phone berdasarkan kode_customer yang dipilih
        $customer = \App\Models\Customer::where('kode_customer', $state)->first();
        $set('nama_customer', $customer ? $customer->nama_customer : null);
        $set('phone', $customer ? $customer->no_telepon : null);
    }) 
    ->required(),

                Forms\components\TextInput::make('nama_customer')
                ->label("Nama Customer")
                ->required()
                ->maxLength(255),

                Forms\components\TextInput::make('phone')
                ->label("Phone")
                ->required()
                ->maxLength(255),

                Select::make('Product_id') 
                ->label('Kode Produk')
                ->options(function () {
                    return \App\Models\Produk::all()->pluck('Nama_produk', 'kode_produk')->map(function ($nama_produk, $kode_produk) {
                        return "{$kode_produk} - {$nama_produk}";
                    });
                })
                ->searchable(),
               

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
                Tables\Columns\TextColumn::make('nama_pengguna')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_customer')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_customer')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Product_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('QTY')->label('Kuantitas')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Desc')->label('Deskripsi')->sortable()->searchable(),
                
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
                        Excel::import(new CartImport, $filePath);

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
                    ->modalHeading('Import Data Keranjang')
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
            'index' => Pages\ListCarts::route('/'),
            'create' => Pages\CreateCart::route('/create'),
            'edit' => Pages\EditCart::route('/{record}/edit'),
        ];
    }
}
