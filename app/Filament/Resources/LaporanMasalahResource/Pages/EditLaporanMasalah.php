<?php

namespace App\Filament\Resources\LaporanMasalahResource\Pages;

use App\Filament\Resources\LaporanMasalahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanMasalah extends EditRecord
{
    protected static string $resource = LaporanMasalahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
