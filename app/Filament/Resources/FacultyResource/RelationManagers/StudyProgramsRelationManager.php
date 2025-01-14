<?php

namespace App\Filament\Resources\FacultyResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Campus;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DegreeLevel;
use App\Models\Accreditation;
use App\Models\MasterStudyProgram;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class StudyProgramsRelationManager extends RelationManager
{
    protected static string $relationship = 'study_programs';

    public static ?string $modelLabel = 'Program Studi';

    protected static ?string $title = 'Program Studi';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Program Studi')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('campus_id')
                    ->label('Kampus')
                    ->options(Campus::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->default(null)
                    ->native(false),
                Forms\Components\Select::make('accreditation_id')
                    ->label('Akreditasi')
                    ->options(Accreditation::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->default(null)
                    ->native(false),
                Forms\Components\Select::make('degree_level_id')
                    ->label('Jenjang Studi')
                    ->options(DegreeLevel::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->default(null)
                    ->native(false),
                Forms\Components\Select::make('master_study_program_id')
                    ->label('Master Program Studi')
                    ->options(MasterStudyProgram::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->default(null)
                    ->native(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Program Studi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('campus.name')
                    ->label('Kampus')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('accreditation.name')
                    ->label('Akreditasi')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('degree_level.name')
                    ->label('Jenjang Studi')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modalHeading('Edit Program Studi'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
