<?php

namespace App\Filament\Resources\CampusResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    public static ?string $modelLabel = 'Review dan Rating';

    protected static ?string $title = 'Review dan Rating';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rating')
                    ->label('Rating')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->step(1),
                Forms\Components\Textarea::make('review')
                    ->label('Review')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->native(false)
                    ->required()
                    ->label('User')
                    ->helperText('Users can only submit one review per campus.')
                    ->rules([
                        function () {
                            return Rule::unique('campus_reviews', 'user_id')
                                ->where('campus_id', $this->getOwnerRecord()->id)
                                ->ignore($this->getMountedTableActionRecord()?->id);
                        }
                    ]),
            ])->columns(0);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user.name')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->sortable(),
                Tables\Columns\TextColumn::make('review')
                    ->label('Review')
                    ->limit(50),
                ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->iconButton(),
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
