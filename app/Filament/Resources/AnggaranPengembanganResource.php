<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnggaranPengembanganResource\Pages;
use App\Filament\Resources\AnggaranPengembanganResource\RelationManagers;
use App\Models\Anggaran_pengembangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class AnggaranPengembanganResource extends Resource
{
    protected static ?string $model = Anggaran_pengembangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextArea::make('deskripsi_kegiatan')
                    ->label('Deskripsi Kegiatan')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_anggaran')
                    ->label('Jumlah Anggaran')
                    ->required()
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set) {
                        $set('jumlah_anggaran', preg_replace('/[^0-9]/', '', $state));
                    })
                    ->extraAttributes([
                        'x-init' => 'Inputmask("decimal", { radixPoint: ".", groupSeparator: ",", autoGroup: true }).mask($el)',
                    ]),
                Forms\Components\DatePicker::make('tanggal_pengajuan')
                    ->nullable(),
                Forms\Components\Select::make('status')
                    ->options([
                        'disetujui'=>'Disetujui',
                        'pending'=>'Pending',
                        'ditolak'=>'Ditolak',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kegiatan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('deskripsi_kegiatan')->limit('100'),
                Tables\Columns\TextColumn::make('jumlah_anggaran')->money('IDR'),
                Tables\Columns\TextColumn::make('tanggal_pengajuan')->date(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')->dateTime('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAnggaranPengembangans::route('/'),
            'create' => Pages\CreateAnggaranPengembangan::route('/create'),
            'edit' => Pages\EditAnggaranPengembangan::route('/{record}/edit'),
        ];
    }
}
