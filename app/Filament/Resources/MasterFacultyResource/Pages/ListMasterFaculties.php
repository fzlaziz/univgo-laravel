<?php

namespace App\Filament\Resources\MasterFacultyResource\Pages;

use App\Filament\Resources\MasterFacultyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterFaculties extends ListRecords
{
    protected static string $resource = MasterFacultyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
