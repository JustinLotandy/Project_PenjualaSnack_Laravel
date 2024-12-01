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
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use App\Imports\DataBankImport;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;


class DataBankResource extends Resource
{
    protected static ?string $model = DataBank::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Data Dan Pengguna';

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

                Forms\Components\TextInput::make('kode_databank')
                ->label("Kode Databank")
                ->required()
                ->default('BANK-') // Awali dengan DB-
                ->placeholder(function () {
                    $lastKode = DataBank::query()
                        ->whereNotNull('kode_databank')
                        ->latest('kode_databank')
                        ->value('kode_databank');
            
                    return $lastKode ? "Last Code: $lastKode" : 'No previous code';
                })
                ->hint(function () {
                    $lastKode = DataBank::query()
                        ->whereNotNull('kode_databank')
                        ->latest('kode_databank')
                        ->value('kode_databank');
            
                    return $lastKode ? "Kode terakhir: $lastKode" : 'Belum ada kode databank sebelumnya';
                })
                ->maxLength(20),
            
                Forms\components\TextInput::make('nama_databank')
                ->label("Nama")
                ->required()
                ->maxLength(20),
                
                Forms\components\TextInput::make('norek')
                ->label("Norek")
                ->required()
                ->maxLength(16),
            

                FileUpload::make('file')
                ->label('Upload Gambar')
                ->acceptedFileTypes(['image/png', 'image/jpeg'])
                ->directory('uploads/images') 
                ->visibility('public') 
                ->required(), 

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
                Tables\Columns\TextColumn::make('kode_databank')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_databank')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('norek')->sortable()->searchable(),
                ImageColumn::make('file') 
                ->width(100)
                ->height(100)
                ->disk('public') 
                ->url(fn($record) => Storage::disk('public')->url($record->image)),
                Tables\Columns\TextColumn::make('created_by')->sortable()->searchable(),
                
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
                        Excel::import(new DataBankImport, $filePath);

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
                    ->modalHeading('Import Data Bank')
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
            'index' => Pages\ListDataBanks::route('/'),
            'create' => Pages\CreateDataBank::route('/create'),
            'edit' => Pages\EditDataBank::route('/{record}/edit'),
        ];
    }
}
