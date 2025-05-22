<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getFormActions(): array
    {
        return [
            Actions\CreateAction::make('create')
                ->label('Ajouter') // Modifier le texte ici
                ->action('create'),
             Actions\ViewAction::make('cancel')
                ->label('Annuler')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
    
    protected function getRedirectUrl(): string
    {
        // Redirige vers la liste des utilisateurs après la création
        return $this->getResource()::getUrl('index');
    }
}