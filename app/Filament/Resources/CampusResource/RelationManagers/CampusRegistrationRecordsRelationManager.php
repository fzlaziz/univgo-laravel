<?php

namespace App\Filament\Resources\CampusResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampusRegistrationRecordsRelationManager extends RelationManager
{
    protected static string $relationship = 'campus_registration_records';

    public static ?string $modelLabel = 'Record Jumlah Pendaftar';

    protected static ?string $title = 'Record Jumlah Pendaftar';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('year')
                    ->label('Tahun')
                    ->numeric()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(4),
                Forms\Components\TextInput::make('total_registrants')
                    ->label('Jumlah Pendaftar')
                    ->numeric()
                    ->required()
                    ->unique()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('year')
            ->columns([
                Tables\Columns\TextColumn::make('year')->sortable()->label('Tahun'),
                Tables\Columns\TextColumn::make('total_registrants')->sortable()->label('Jumlah Pendaftar'),
            ])
            ->defaultSort('year', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->iconButton()
                ->modalHeading('Edit Record Jumlah Pendaftar')
                ,
                Tables\Actions\DeleteAction::make()
                ->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    // public function isReadOnly(): bool { return false; }
}
