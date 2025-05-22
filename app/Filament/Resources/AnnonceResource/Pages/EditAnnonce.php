<?php

namespace App\Filament\Resources\AnnonceResource\Pages;

use App\Filament\Resources\AnnonceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnnonce extends EditRecord
{
    protected static string $resource = AnnonceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Redirige vers la liste des utilisateurs après la création
        return $this->getResource()::getUrl('index');
    }
}
