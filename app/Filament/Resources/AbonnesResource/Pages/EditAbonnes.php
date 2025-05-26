<?php

namespace App\Filament\Resources\AbonnesResource\Pages;

use App\Filament\Resources\AbonnesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbonnes extends EditRecord
{
    protected static string $resource = AbonnesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
