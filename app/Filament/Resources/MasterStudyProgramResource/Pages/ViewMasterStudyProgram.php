<?php

namespace App\Filament\Resources\MasterStudyProgramResource\Pages;

use App\Filament\Resources\MasterStudyProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMasterStudyProgram extends ViewRecord
{
    protected static string $resource = MasterStudyProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
