<?php

namespace App\Filament\Resources\SasaranResource\Pages;

use App\Filament\Resources\SasaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSasarans extends ManageRecords
{
    protected static string $resource = SasaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Sasaran'),
        ];
    }
}
