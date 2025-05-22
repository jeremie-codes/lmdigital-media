<?php

namespace App\Filament\Resources\OpinionEtDecouverteResource\Pages;

use App\Filament\Resources\OpinionEtDecouverteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOpinionEtDecouverte extends CreateRecord
{
    protected static string $resource = OpinionEtDecouverteResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la liste des utilisateurs après la création
        return $this->getResource()::getUrl('index');
    }
}
