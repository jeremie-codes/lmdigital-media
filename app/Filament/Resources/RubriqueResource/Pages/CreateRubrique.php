<?php

namespace App\Filament\Resources\RubriqueResource\Pages;

use App\Filament\Resources\RubriqueResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRubrique extends CreateRecord
{
    protected static string $resource = RubriqueResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirige vers la liste des utilisateurs après la création
        return $this->getResource()::getUrl('index');
    }
}
