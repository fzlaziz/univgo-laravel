<?php

namespace App\Filament\Resources\CampusResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CampusRankingsRelationManager extends RelationManager
{
    protected static string $relationship = 'campus_rankings';

    public static ?string $modelLabel = 'Ranking Kampus';

    protected static ?string $title = 'Ranking Kampus';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('campus_ranking_id')
                    ->label('Sumber Ranking')
                    ->relationship('campus_ranking', 'source')
                    ->required()
                    ->rule(function () {
                        $record = $this->getMountedTableActionRecord();
                        $recordId = $record ? $record->id : null;

                        // debugging purpose
                        // $duplicateExists = DB::table('campus_campus_ranking')
                        //     ->where('campus_id', $this->getOwnerRecord()->id)
                        //     ->where('campus_ranking_id', $this->getMountedTableActionRecord()->campus_ranking_id)
                        //     ->where('id', '!=', $recordId)
                        //     ->exists();
                        // dd($duplicateExists);

                        return Rule::unique('campus_campus_ranking', 'campus_ranking_id')
                            ->where('campus_id', $this->getOwnerRecord()->id)
                            ->ignore($recordId, 'id');
                    }),
                Forms\Components\TextInput::make('rank')
                    ->label('Ranking')
                    ->required()
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('rank')
            ->columns([
                Tables\Columns\TextColumn::make('campus_ranking.source')->label('Sumber Ranking'),
                Tables\Columns\TextColumn::make('rank')->label('Ranking'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Tambah Ranking'),
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
