<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyProgramResource\Pages;
use App\Filament\Resources\StudyProgramResource\RelationManagers;
use App\Models\Accreditation;
use App\Models\StudyProgram;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Campus;
use App\Models\DegreeLevel;
use App\Models\Faculty;
use App\Models\MasterStudyProgram;

class StudyProgramResource extends Resource
{
    protected static ?string $model = StudyProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = "Data Kampus";

    protected static ?string $navigationLabel = 'Program Studi';

    public static ?string $modelLabel = 'Program Studi';

    public static function form(Form $form): Form
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
                Forms\Components\Select::make('faculty_id')
                    ->label('Fakultas')
                    ->options(Faculty::all()->pluck('name', 'id'))
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Program Studi')
                    ->searchable(),
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
                Tables\Columns\TextColumn::make('faculty.name')
                    ->label('Fakultas')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('master_study_program.name')
                    ->label('Master Program Studi')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->iconButton(),
                Tables\Actions\EditAction::make()
                ->iconButton(),
                Tables\Actions\DeleteAction::make()
                ->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudyPrograms::route('/'),
            'create' => Pages\CreateStudyProgram::route('/create'),
            'view' => Pages\ViewStudyProgram::route('/{record}'),
            'edit' => Pages\EditStudyProgram::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
