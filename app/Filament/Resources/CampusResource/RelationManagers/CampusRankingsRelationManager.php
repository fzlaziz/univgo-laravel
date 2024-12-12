<?php

namespace App\Filament\Resources\CampusResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampusRankingsRelationManager extends RelationManager
{
    protected static string $relationship = 'campus_rankings';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('campus_ranking_id')
                    ->relationship('campus_ranking', 'source')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('rank')
                    ->required()
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('rank')
            ->columns([
                Tables\Columns\TextColumn::make('campus_ranking.source'),
                Tables\Columns\TextColumn::make('rank'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Add Rank'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->iconButton(),
                Tables\Actions\DeleteAction::make()
                ->iconButton(),
            ])
            ->bulkActions([
            ]);
    }
}
