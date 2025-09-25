<?php

namespace App\Filament\Resources\WidyaiswaraResource\Pages;

use App\Filament\Resources\WidyaiswaraResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWidyaiswaras extends ManageRecords
{
    protected static string $resource = WidyaiswaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Widyaiswara'),
        ];
    }
}
