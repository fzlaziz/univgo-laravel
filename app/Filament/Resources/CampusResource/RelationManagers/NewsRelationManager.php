<?php

namespace App\Filament\Resources\CampusResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsRelationManager extends RelationManager
{
    protected static string $relationship = 'news';

    public static ?string $modelLabel = 'Berita Kampus';

    protected static ?string $title = 'Berita Kampus';


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->label('Judul Berita')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function(string $operation, string $state, Forms\Set $set){
                    if($operation === 'edit'){
                        return;
                    }
                    $set('slug', \Illuminate\Support\Str::slug($state));
                }),
            Forms\Components\FileUpload::make('attachment')
                ->label('Upload Foto')
                ->image()
                ->disk(env('FILESYSTEM_DISK', 'public'))
                ->directory('news-attachments')
                ->default(null)
                ->visibility('public')
                ->image()
                ->imageEditor()
                ->imageEditorAspectRatios([
                    '16:9',
                    '4:3',
                ]),
            Forms\Components\Textarea::make('excerpt')
                ->label('Kutipan')
                ->required()
                ->columnSpanFull(),
            Forms\Components\RichEditor::make('content')
                ->label('Konten Berita')
                ->toolbarButtons([
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ])
                ->required()
                ->columnSpanFull(),
            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->readOnly()
                ->maxLength(255),
        ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Berita')
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
}
