<?php

namespace App\Filament\Resources\CampusTypeResource\Pages;

use App\Filament\Resources\CampusTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampusTypes extends ListRecords
{
    protected static string $resource = CampusTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
