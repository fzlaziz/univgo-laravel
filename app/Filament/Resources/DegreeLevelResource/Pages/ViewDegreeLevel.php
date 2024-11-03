<?php

namespace App\Filament\Resources\DegreeLevelResource\Pages;

use App\Filament\Resources\DegreeLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDegreeLevel extends ViewRecord
{
    protected static string $resource = DegreeLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
