<?php

namespace App\Filament\Resources\JenisPelatihanResource\Pages;

use App\Filament\Resources\JenisPelatihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJenisPelatihans extends ManageRecords
{
    protected static string $resource = JenisPelatihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Jenis Pelatihan'),
        ];
    }
}
