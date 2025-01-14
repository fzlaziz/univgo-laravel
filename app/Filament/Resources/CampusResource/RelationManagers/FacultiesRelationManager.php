<?php

namespace App\Filament\Resources\CampusResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\MasterFaculty;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FacultyResource;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class FacultiesRelationManager extends RelationManager
{
    protected static string $relationship = 'faculties';

    public static ?string $modelLabel = 'Fakultas';

    protected static ?string $title = 'Fakultas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Fakultas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('master_faculty_id')
                    ->label('Master Fakultas')
                    ->options(MasterFaculty::all()->pluck('name', 'id'))
                    ->searchable()
                    ->default(null)
                    ->native(false)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Fakultas')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->url(fn ($record): string => FacultyResource::getUrl('edit', ['record' => $record])),
                Tables\Actions\DeleteAction::make()
                    ->iconButton(),
            ])
            ->bulkActions([
            ]);
    }
}
