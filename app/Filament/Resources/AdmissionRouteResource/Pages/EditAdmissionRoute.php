<?php

namespace App\Filament\Resources\AdmissionRouteResource\Pages;

use App\Filament\Resources\AdmissionRouteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmissionRoute extends EditRecord
{
    protected static string $resource = AdmissionRouteResource::class;

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
