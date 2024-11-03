<?php

namespace App\Filament\Resources\MasterFacultyResource\Pages;

use App\Filament\Resources\MasterFacultyResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMasterFaculty extends ViewRecord
{
    protected static string $resource = MasterFacultyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
