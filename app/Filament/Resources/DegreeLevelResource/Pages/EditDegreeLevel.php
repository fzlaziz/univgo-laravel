<?php

namespace App\Filament\Resources\DegreeLevelResource\Pages;

use App\Filament\Resources\DegreeLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDegreeLevel extends EditRecord
{
    protected static string $resource = DegreeLevelResource::class;

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
