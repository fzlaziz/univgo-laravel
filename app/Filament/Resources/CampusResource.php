<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampusResource\Pages;
use App\Filament\Resources\CampusResource\RelationManagers;
use App\Filament\Resources\CampusResource\RelationManagers\CampusRankingsRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\FacilitiesRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\FacultiesRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\GalleriesRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\NewsRelationManager;
use App\Models\Accreditation;
use App\Models\Campus;
use App\Models\CampusType;
use App\Models\DegreeLevel;
use App\Models\District;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampusResource extends Resource
{
    protected static ?string $model = Campus::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = "Campus Data";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(function ($record) {
                    return $record ? 'Edit Campus' : 'Create Campus';
                })
                ->description(function ($record) {
                    return $record ? 'Please update the form below to edit the campus.' : 'Please fill in the form below to create a new campus.';
                })
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('description')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_establishment')
                            ->native(false)
                            ->displayFormat('d F Y')
                            ->required(),
                        Forms\Components\TextInput::make('address_latitude')
                            ->required(),
                        Forms\Components\TextInput::make('address_longitude')
                            ->required(),
                        Forms\Components\TextInput::make('web_address')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('youtube')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('number_of_graduates')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('number_of_registrants')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('min_single_tuition')
                            ->numeric()
                            ->default(null),
                        Forms\Components\TextInput::make('max_single_tuition')
                            ->numeric()
                            ->default(null),
                        Forms\Components\Select::make('accreditation_id')
                            ->label('Accreditation')
                            ->options(Accreditation::all()->pluck('name', 'id'))
                            ->searchable()
                            ->default(null)
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('district_id')
                            ->label('Kecamatan')
                            ->relationship('district','name')
                            ->searchable()
                            ->default(null)
                            ->required()
                            ->native(false),
                        Forms\Components\Select::make('campus_type_id')
                            ->label('Tipe Kampus')
                            ->options(CampusType::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required()
                            ->native(false)
                            ->default(null),
                    ])->columnSpan(2)->columns(2),
                Group::make()->schema([
                    Section::make('Logo')
                        ->description('Please upload logo for the campus.')
                        ->schema([
                            Forms\Components\FileUpload::make('logo_path')
                            ->label('Upload Logo')
                            ->image()
                            ->disk(env('FILESYSTEM_DISK', 'public'))
                            ->directory('campus-logo')
                            ->default(null)
                            ->visibility('public')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '3:4',
                                '1:1',
                            ]),
                        ]),
                    Section::make('Degree Levels')
                        ->description('Please select the degree levels that are available in the campus.')
                        ->schema([
                            Forms\Components\Select::make('degree_levels')
                            ->relationship('degree_levels', 'name')
                            ->options(DegreeLevel::all()->pluck('name', 'id'))
                            ->multiple()
                        ]),
                    Section::make('Admission Routes')
                        ->description('Please select the admission routes that are available in the campus.')
                        ->schema([
                            Forms\Components\CheckboxList::make('admission_routes')
                            ->relationship(titleAttribute: 'name')
                        ]),
                ])->columnSpan([
                    'default' => 2,
                    'sm' => 2,
                    'md' => 2,
                    'lg' => 1,
                ]),

            ])->columns([
                'default' => 2,
                'sm' => 2,
                'md' => 2,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('date_of_establishment')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('logo_path')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address_latitude')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address_longitude')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('web_address')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('phone_number')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('number_of_graduates')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('number_of_registrants')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('min_single_tuition')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('max_single_tuition')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('accreditation.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('district_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('campus_type.name')
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
            FacultiesRelationManager::class,
            CampusRankingsRelationManager::class,
            FacilitiesRelationManager::class,
            GalleriesRelationManager::class,
            NewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampuses::route('/'),
            'create' => Pages\CreateCampus::route('/create'),
            'view' => Pages\ViewCampus::route('/{record}'),
            'edit' => Pages\EditCampus::route('/{record}/edit'),
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
