<?php

namespace App\Filament\Resources\InfosLegalsResource\Pages;

use App\Filament\Resources\InfosLegalsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfosLegals extends EditRecord
{
    protected static string $resource = InfosLegalsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
