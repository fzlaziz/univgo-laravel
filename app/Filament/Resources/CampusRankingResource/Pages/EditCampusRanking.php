<?php

namespace App\Filament\Resources\CampusRankingResource\Pages;

use App\Filament\Resources\CampusRankingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampusRanking extends EditRecord
{
    protected static string $resource = CampusRankingResource::class;

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
