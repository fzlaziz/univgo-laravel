<?php

namespace App\Filament\Resources\AdmissionRouteResource\Pages;

use App\Filament\Resources\AdmissionRouteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionRoutes extends ListRecords
{
    protected static string $resource = AdmissionRouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
