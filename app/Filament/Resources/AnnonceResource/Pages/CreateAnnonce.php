<?php

namespace App\Filament\Resources\AnnonceResource\Pages;

use App\Filament\Resources\AnnonceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnonce extends CreateRecord
{
    protected static string $resource = AnnonceResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la liste des utilisateurs après la création
        return $this->getResource()::getUrl('index');
    }
}
