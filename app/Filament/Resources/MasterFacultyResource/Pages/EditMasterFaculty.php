<?php

namespace App\Filament\Resources\MasterFacultyResource\Pages;

use App\Filament\Resources\MasterFacultyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterFaculty extends EditRecord
{
    protected static string $resource = MasterFacultyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
