<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanMasalahResource\Pages;
use App\Filament\Resources\LaporanMasalahResource\RelationManagers;
use App\Models\LaporanMasalah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Masyarakat;
use App\Models\Fasilitas;
use Filament\Forms\Components\DatePicker;

class LaporanMasalahResource extends Resource
{
    protected static ?string $model = LaporanMasalah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_masyarakat')
                    ->label('Masyarakat')
                    ->relationship('masyarakat', 'nama')
                    ->required(),
                Forms\Components\Select::make('id_fasilitas')
                    ->label('Fasilitas')
                    ->options(Fasilitas::all()->pluck('jenis_fasilitas','id'))
                    ->required(),
                Forms\Components\TextInput::make('jenis_masalah')
                    ->label('Jenis Masalah')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextArea::make('deskripsi_masalah')
                    ->label('Deskripsi Masalah')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_laporan')
                    ->label('Tanggal Laporan')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'baru' => 'Baru',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                    ])
                    ->default('baru')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('masyarakat.nama')->label('Masyarakat'),
                Tables\Columns\TextColumn::make('fasilitas.jenis_fasilitas')->label('Fasilitas'),
                Tables\Columns\TextColumn::make('jenis_masalah')->label('Jenis Masalah'),
                Tables\Columns\TextColumn::make('deskripsi_masalah')->label('Deskripsi Masalah'),
                Tables\Columns\TextColumn::make('tanggal_laporan')->label('Tanggal Laporan')->date(),
                Tables\Columns\TextColumn::make('status')->label('Status'),
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
            'index' => Pages\ListLaporanMasalahs::route('/'),
            'create' => Pages\CreateLaporanMasalah::route('/create'),
            'edit' => Pages\EditLaporanMasalah::route('/{record}/edit'),
        ];
    }
}
