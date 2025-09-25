<?php

namespace App\Filament\Resources\BidangResource\Pages;

use App\Filament\Resources\BidangResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBidangs extends ManageRecords
{
    protected static string $resource = BidangResource::class;

     protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Bidang'),
        ];
    }
}
