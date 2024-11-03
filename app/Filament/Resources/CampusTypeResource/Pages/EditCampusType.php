<?php

namespace App\Filament\Resources\CampusTypeResource\Pages;

use App\Filament\Resources\CampusTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampusType extends EditRecord
{
    protected static string $resource = CampusTypeResource::class;

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
