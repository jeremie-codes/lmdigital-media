<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class UserCountWidget extends Widget
{
    protected static string $view = 'filament.widgets.user-count-widget'; // Chemin vers la vue

    public function getUserCount(): int
    {
        return User::count(); // Compte le nombre d'utilisateurs
    }
}