<?php

namespace App\Filament\Resources\LaporanMasalahResource\Pages;

use App\Filament\Resources\LaporanMasalahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanMasalahs extends ListRecords
{
    protected static string $resource = LaporanMasalahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
