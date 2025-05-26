<?php

namespace App\Filament\Resources\AbonnesResource\Pages;

use App\Filament\Resources\AbonnesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbonnes extends ListRecords
{
    protected static string $resource = AbonnesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
