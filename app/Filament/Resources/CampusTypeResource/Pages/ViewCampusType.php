<?php

namespace App\Filament\Resources\CampusTypeResource\Pages;

use App\Filament\Resources\CampusTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCampusType extends ViewRecord
{
    protected static string $resource = CampusTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
