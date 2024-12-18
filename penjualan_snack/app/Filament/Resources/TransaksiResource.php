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
use PhpParser\Node\Stmt\Label;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Imports\TransaksiImport;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;


class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Transaksi';
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

            Forms\Components\TextInput::make('kode_transaksi')
            ->label('Kode Transaksi')
            ->required()
            ->default('TRK-')
            ->placeholder(function () {
                $lastKode = Transaksi::query()
                    ->whereNotNull('kode_transaksi')
                    ->latest('kode_transaksi')
                    ->value('kode_transaksi');
                    
                return $lastKode ? "Last Code: $lastKode" : 'No previous code';
            })
            ->hint(function () {
                $lastKode = Transaksi::query()
                    ->whereNotNull('kode_transaksi')
                    ->latest('kode_transaksi')
                    ->value('kode_transaksi');
                    
                return $lastKode ? "Kode terakhir: $lastKode" : 'Belum ada kode transaksi sebelumnya';
            })
            ->maxLength(11),
            
            Select::make('kode_cart')
            ->label('Kode Cart')
            ->options(function () {
                // Menampilkan semua kode_cart di dropdown
                return \App\Models\Cart::pluck('kode_cart', 'kode_cart');
            })
            ->reactive() // Agar dropdown menjadi reaktif
            ->afterStateUpdated(function (callable $set, $state) {
                // Ambil data cart berdasarkan kode_cart yang dipilih
                $cart = \App\Models\Cart::where('kode_cart', $state)->first();

                if ($cart) {
                    // Isi otomatis kolom lain berdasarkan data dari tabel cart
                    $set('kode_customer', $cart->kode_customer);
                    $set('nama_customer', $cart->nama_customer);
                    $set('QTY', $cart->QTY);
                    $set('kode_produk', $cart->Product_id);
                    $set('nama_produk', $cart->Desc);
                    $set('Phone', $cart->phone);
                }
            })
            ->required(),

            Select::make('kode_databank')
                ->label('Kode DataBank')
                ->options(function () {
                    // Ambil Userid sebagai key dan tampilkan hanya Userid di dropdown
                    return \App\Models\DataBank::pluck('kode_databank', 'kode_databank');
                })
                ->reactive() // Aktifkan reaktivitas untuk mendeteksi perubahan
                ->afterStateUpdated(function (callable $set, $state) {
                    // Cari Username berdasarkan Userid yang dipilih
                    $databank = \App\Models\DataBank::where('kode_databank', $state)->first();
                })  
                ->required(),

            Forms\components\TextInput::make('kode_customer')
            ->label('Kode Customer')
            ->readonly(),

            Forms\components\TextInput::make('nama_customer')
            ->label('Nama Customer')
            ->readonly(),

            Forms\components\TextInput::make('Phone')
            ->label('Phone')
            ->readonly(),

            Forms\components\TextInput::make('kode_produk')
            ->label('Kode Produk')
            ->readonly(),

            Forms\components\TextInput::make('nama_produk')
            ->label('Nama Produk')
            ->readonly(),

            Forms\components\TextInput::make('QTY')
            ->label('Kuantitas')
            ->readonly(),

            Forms\components\TextInput::make('Total_berat')
            ->label("Total Berat")
            ->required()
            ->maxLength(255),

            Forms\components\TextInput::make('No_resi')
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

            FileUpload::make('Bukti_transaksi')
                    ->label('Upload File')
                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                    ->directory('uploads/images') 
                    ->visibility('public') 
                    ->required(), 

            Forms\components\DateTimePicker::make('Date')
            ->label("Date")
            ->required(),

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
                Tables\Columns\TextColumn::make('kode_transaksi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_cart')->label('Kode Cart')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_databank')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Total_berat')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_customer')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_customer')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Phone')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_produk')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Cart.QTY')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('No_resi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Kurir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Kota')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Ongkir')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Total')->sortable()->searchable(),
                ImageColumn::make('Bukti_transaksi') 
                ->width(100)
                ->disk('public') 
                ->url(fn($record) => Storage::disk('public')->url($record->image)),
                Tables\Columns\TextColumn::make('Date')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Adress')->sortable()->searchable(),
                IconColumn::make('status_approval')
                ->boolean()
                ->label('Approval Status')
                ->trueIcon('heroicon-s-check-circle') // Ikon hijau
                ->falseIcon('heroicon-s-x-circle') // Ikon merah
                ->colors([
                    'success' => fn ($state) => $state === 'Approved',
                    'danger' => fn ($state) => $state === 'Pending',
                ]),
                
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
                        Excel::import(new TransaksiImport, $filePath);

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
                    ->modalHeading('Import Data Transaksi')
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
