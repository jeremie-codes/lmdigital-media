<?php

namespace App\Filament\Resources\OpinionEtDecouverteResource\Pages;

use App\Filament\Resources\OpinionEtDecouverteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpinionEtDecouvertes extends ListRecords
{
    protected static string $resource = OpinionEtDecouverteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Ajouter un article'),
        ];
    }
}
