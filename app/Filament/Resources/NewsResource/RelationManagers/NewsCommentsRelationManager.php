<?php

namespace App\Filament\Resources\NewsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsCommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'news_comments';

    public static ?string $modelLabel = 'Komentar Berita';

    protected static ?string $title = 'Komentar Berita';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('text')
                    ->label('Komentar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->required()
                    ->relationship('user', 'name')
                    ->native(false)
                    ->searchable()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading('Komentar Berita')
            ->recordTitleAttribute('text')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Nama User'),
                Tables\Columns\TextColumn::make('text')->label('Komentar'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modalHeading('Ubah Komentar')
                ->iconButton(),
                Tables\Actions\DeleteAction::make()->modalHeading('Hapus Komentar')
                ->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
