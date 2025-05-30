<?php

namespace App\Filament\Resources\BreakingNewsResource\Pages;

use App\Filament\Resources\BreakingNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBreakingNews extends CreateRecord
{
    protected static string $resource = BreakingNewsResource::class;

    protected function getRedirectUrl(): string
    {
        return BreakingNewsResource::getUrl('index');
    }


}
