<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasyarakatResource\Pages;
use App\Filament\Resources\MasyarakatResource\RelationManagers;
use App\Models\Masyarakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasyarakatResource extends Resource
{
    protected static ?string $model = Masyarakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_masyarakat')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextArea::make('alamat')
                    ->required(),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(18),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('alamat')->limit(100),
                Tables\Columns\TextColumn::make('kontak'),
                Tables\Columns\TextColumn::make('created_ad')->dateTime(),
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
            'index' => Pages\ListMasyarakats::route('/'),
            'create' => Pages\CreateMasyarakat::route('/create'),
            'edit' => Pages\EditMasyarakat::route('/{record}/edit'),
        ];
    }
}
