<?php

namespace App\Filament\Resources\AdmissionRouteResource\Pages;

use App\Filament\Resources\AdmissionRouteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAdmissionRoute extends ViewRecord
{
    protected static string $resource = AdmissionRouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
