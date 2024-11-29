<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprovalResource\Pages;
use App\Models\Approval;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use App\Imports\ApprovalImport;
use Filament\Tables\Columns\ImageColumn;

class ApprovalResource extends Resource
{
    
    protected static ?string $model = Approval::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $navigationGroup = 'Transaksi';

    public static function getModelLabel(): string
    {
        return 'Approval';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Approval';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_transaksi')
                    ->label("Kode Transaksi")
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('No_resi')
                    ->label("No Resi")
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kode_customer')
                    ->label("Kode Customer")
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('nama_customer')
                    ->label("Nama Customer")
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('Status')
                    ->label("Status")
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_transaksi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('No_resi')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kode_customer')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_customer')->sortable()->searchable(),

                
                Tables\Columns\BadgeColumn::make('Status')
                    ->label('Approval Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->getStateUsing(fn ($record) => $record->Status), // Ambil status dari model
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('Approve')
                    ->action(function ($record) {
                        // Update status di tabel Approval
                        $record->update(['Status' => 'approved']);

                        // Update status di tabel Transaksi
                        $transaksi = Transaksi::where('kode_transaksi', $record->kode_transaksi)->first();
                        if ($transaksi) {
                            $transaksi->update(['status_approval' => 'approved']);
                        }
                    })
                    ->color('success')
                    ->requiresConfirmation()
                    ->successNotificationTitle('Status updated successfully.'),
            ])
            ->headerActions([
                Action::make('importExcel')
                    ->label('Import Excel')
                    ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new ApprovalImport, $filePath);

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
                    ->modalHeading('Import Data Approval')
                    ->modalButton('Import')
                    ->color('success'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListApprovals::route('/'),
            'create' => Pages\CreateApproval::route('/create'),
            'edit' => Pages\EditApproval::route('/{record}/edit'),
        ];
    }
}
