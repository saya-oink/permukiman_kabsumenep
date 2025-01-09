<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerencanaanResource\Pages;
use App\Filament\Resources\PerencanaanResource\RelationManagers;
use App\Models\Perencanaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerencanaanResource extends Resource
{
    protected static ?string $model = Perencanaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
        Forms\Components\TextInput::make('nama_program')
            ->label('Nama Program')
            ->required()
            ->maxLength(100),
        Forms\Components\TextArea::make('deskripsi_program')
            ->label('Deskripsi Program')
            ->required(),
        Forms\Components\TextInput::make('anggaran')
            ->label('Anggaran')
            ->required()
            ->numeric()
            ->reactive()
            ->afterStateUpdated(function ($state, $set) {
                $set('jumlah_anggaran', preg_replace('/[^0-9]/', '', $state));
            })
            ->extraAttributes([
                'x-init' => 'Inputmask("decimal", { radixPoint: ".", groupSeparator: ",", autoGroup: true }).mask($el)',
            ]),
        Forms\Components\DatePicker::make('tanggal_perencanaan')
            ->label('Tanggal Perencanaan')
            ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_program')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('deskripsi_program')->limit('100'),
                Tables\Columns\TextColumn::make('anggaran')->money('IDR'),
                Tables\Columns\TextColumn::make('tanggal_perencanaan')->date(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
        
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPerencanaans::route('/'),
            'create' => Pages\CreatePerencanaan::route('/create'),
            'edit' => Pages\EditPerencanaan::route('/{record}/edit'),
        ];
    }
}
