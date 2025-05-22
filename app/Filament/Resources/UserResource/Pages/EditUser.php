<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Supprimer'),
        ];
    }

     protected function getFormActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Enregistrer les modifications')
                ->action('save')
                ->icon('heroicon-o-check'),
                
             Actions\ViewAction::make('cancel')
                ->label('Annuler')
                ->url($this->getResource()::getUrl('index')),
        ];
    }
    
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['password']); // Retire le champ password si vide pour ne pas le modifier
        } else {
            $data['password'] = Hash::make($data['password']); // Hash le mot de passe si rempli
        }

        return $data;
    }

     protected function getRedirectUrl(): string
    {
        // Redirige vers la liste des utilisateurs après la création
        return $this->getResource()::getUrl('index');
    }
}