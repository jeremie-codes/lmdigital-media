<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActualiteResource\Pages;
use App\Filament\Resources\ActualiteResource\RelationManagers;
use App\Models\Actualite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActualiteResource extends Resource
{
    protected static ?string $model = Actualite::class;

    protected static ?string $navigationIcon = 'heroicon-o-radio';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $label = 'Actualités';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Média')
                            ->schema([
                                Forms\Components\FileUpload::make('cover_image')
                                    ->label('Image de couverture')
                                    ->image()
                                    ->required()
                                    ->maxSize(2048) // 2MB
                                    ->directory('covers'),
                            ]),

                        Forms\Components\Section::make('Contenus')
                            ->description('Écrivez le contenu de l\'article')
                            ->schema([
                                Forms\Components\RichEditor::make('content')
                                ->label('')
                                    ->required()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('articles')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Information & Visibilités')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Titre')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) =>
                                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                    ),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->label('Slug (génréré automatiquement)')
                                    ->maxLength(255)
                                    ->readonly(true)
                                    ->unique(Actualite::class, 'slug', ignoreRecord: true)
                                    ->rule('alpha_dash'),
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->columnSpanFull()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Nom de la categorie')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true),
                                        Forms\Components\Textarea::make('description')
                                            ->maxLength(1000)
                                            ->columnSpanFull(),
                                    ]),
                                Forms\Components\DateTimePicker::make('scheduled_at')
                                    ->label('Date de diffusion')
                                    ->required(),
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Publier')
                                    ->default(true),
                            ]),

                        Forms\Components\Section::make('Auteur')
                            ->schema([
                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->default(fn () => auth()->id()),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->query(Actualite::query()->where('type', 'news'))
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Image')
                    ->getStateUsing(fn (Actualite $record) => asset('storage/' . $record->cover_image)),
                Tables\Columns\TextColumn::make('title')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')->limit(15)
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Auteur')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('scheduled_at')
                    ->label('Diffusion')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\BooleanColumn::make('is_published')
                    ->label('Publiéé')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Publiée le')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListActualites::route('/'),
            'create' => Pages\CreateActualite::route('/create'),
            'edit' => Pages\EditActualite::route('/{record}/edit'),
        ];
    }

}
