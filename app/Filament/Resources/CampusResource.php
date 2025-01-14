<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampusResource\Pages;
use App\Filament\Resources\CampusResource\RelationManagers;
use App\Filament\Resources\CampusResource\RelationManagers\CampusRankingsRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\CampusRegistrationRecordsRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\FacilitiesRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\FacultiesRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\GalleriesRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\NewsRelationManager;
use App\Filament\Resources\CampusResource\RelationManagers\ReviewsRelationManager;
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
use App\Forms\Components\MapField;

class CampusResource extends Resource
{
    protected static ?string $model = Campus::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = "Data Kampus";

    public static ?string $modelLabel = 'Kampus';

    protected static ?string $navigationLabel = 'Kampus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(function ($record) {
                    return $record ? 'Edit Kampus' : 'Tambah Kampus';
                })
                ->description(function ($record) {
                    return $record ? 'Mohon update data di bawah untuk merubah data kampus' : 'Mohon isi data di bawah untuk menambahkan data kampus.';
                })
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Kampus')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('description')
                            ->label('Lokasi')
                            ->placeholder('Kecamatan, Kota')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_establishment')
                            ->label('Tanggal Berdiri')
                            ->native(false)
                            ->displayFormat('d F Y')
                            ->required(),
                        MapField::make('address_search')
                            ->label('Cari Koordinat')
                            ->placeholder('Masukkan Nama Kampus')
                            ->latitudeField('address_latitude')
                            ->longitudeField('address_longitude')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('address_latitude')
                            ->label('Koordinat Latitude')
                            ->required(),
                        Forms\Components\TextInput::make('address_longitude')
                            ->label('Koordinat Longitude')
                            ->required(),
                        Forms\Components\TextInput::make('web_address')
                            ->label('Alamat Website')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('youtube')
                            ->label('Link Youtube')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->label('Link Instagram')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_number')
                            ->label('No Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('number_of_graduates')
                            ->label('Jumlah Lulusan')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('number_of_registrants')
                            ->label('Jumlah Pendaftar')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('min_single_tuition')
                            ->label('UKT Terendah')
                            ->numeric()
                            ->default(null),
                        Forms\Components\TextInput::make('max_single_tuition')
                            ->label('UKT Tertinggi')
                            ->numeric()
                            ->default(null),
                        Forms\Components\Select::make('accreditation_id')
                            ->label('Akreditasi')
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
                        ->description('Mohon Upload Logo Kampus')
                        ->schema([
                            Forms\Components\FileUpload::make('logo_path')
                            ->label('Upload Logo')
                            ->required()
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
                    Section::make('Jenjang Studi')
                        ->description('Mohon Pilih Jenjang Studi yang tersedia di Kampus ini.')
                        ->schema([
                            Forms\Components\Select::make('degree_levels')
                                ->label('Jenjang Studi')
                                ->relationship('degree_levels', 'name')
                                ->options(DegreeLevel::all()->pluck('name', 'id'))
                                ->multiple()
                        ]),
                    Section::make('Jalur Masuk')
                        ->description('Mohon Pilih Jalur Masuk yang tersedia di Kampus ini.')
                        ->schema([
                            Forms\Components\CheckboxList::make('admission_routes')
                                ->label('Nama Jalur Masuk')
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
                    ->label('Nama Kampus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('date_of_establishment')
                    ->label('Tanggal Berdiri')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address_latitude')
                    ->label('Koordinat Latitude')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('address_longitude')
                    ->label('Koordinat Longitude')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('accreditation.name')
                    ->label('Akreditasi')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('campus_type.name')
                    ->label('Tipe Kampus')
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
            ReviewsRelationManager::class,
            CampusRegistrationRecordsRelationManager::class,
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
