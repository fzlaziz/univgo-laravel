<?php

namespace App\Filament\Resources\CampusRankingResource\Pages;

use App\Filament\Resources\CampusRankingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCampusRankings extends ListRecords
{
    protected static string $resource = CampusRankingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
