<?php

namespace App\Filament\Resources\OpinionEtDecouverteResource\Pages;

use App\Filament\Resources\OpinionEtDecouverteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpinionEtDecouverte extends EditRecord
{
    protected static string $resource = OpinionEtDecouverteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
