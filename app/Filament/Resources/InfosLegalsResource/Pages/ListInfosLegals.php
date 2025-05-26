<?php

namespace App\Filament\Resources\InfosLegalsResource\Pages;

use App\Filament\Resources\InfosLegalsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfosLegals extends ListRecords
{
    protected static string $resource = InfosLegalsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
