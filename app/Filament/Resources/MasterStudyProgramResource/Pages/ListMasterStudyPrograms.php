<?php

namespace App\Filament\Resources\MasterStudyProgramResource\Pages;

use App\Filament\Resources\MasterStudyProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterStudyPrograms extends ListRecords
{
    protected static string $resource = MasterStudyProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
