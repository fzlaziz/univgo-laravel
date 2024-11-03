<?php

namespace App\Filament\Resources\MasterStudyProgramResource\Pages;

use App\Filament\Resources\MasterStudyProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterStudyProgram extends EditRecord
{
    protected static string $resource = MasterStudyProgramResource::class;

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
