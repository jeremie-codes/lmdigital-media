<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $label = 'Vidéos';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Apparence Média')
                            ->description('Ajouter soit lien YouTube, soit une vidéo locale.')
                            ->schema([
                                Forms\Components\FileUpload::make('cover_image')
                                    ->label('Image de couverture')
                                    ->image()
                                    ->required()
                                    ->maxSize(2048) // 2MB
                                    ->directory('covers'),

                                Forms\Components\TextInput::make('youtube_url')
                                    ->label('Lien YouTube')
                                    ->helperText('Entrez l\'URL de la vidéo YouTube. Ex: https://www.youtube.com/watch?v=abc123')
                                    ->required(fn (Collection $livewire) => $livewire->getState('file_path') === null)
                                    ->url()
                                    ->nullable(),

                                Forms\Components\FileUpload::make('file_path')
                                    ->label('Vidéo locale (3Mo max)')
                                    ->helperText('Téléchargez une vidéo locale. Formats acceptés: MP4, WebM, OGG.')
                                    ->required(fn (Collection $livewire) => $livewire->getState('youtube_url') === null)
                                    ->disk('public')
                                    ->directory('videos')
                                    ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                                    ->maxSize(3070) // 3MB
                                    ->nullable(),
                            ]),

                        Forms\Components\Section::make('Content')
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
                                    ->unique(Article::class, 'slug', ignoreRecord: true)
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
                                 Forms\Components\Select::make('rubrique')
                                    ->label('Rubrique')
                                    ->options([
                                        'politique' => 'Politique',
                                        'sport' => 'Sport',
                                        'economie' => 'Economie',
                                        'autres' => 'Autres',
                                    ])
                                    ->required(),
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
            ->query(Article::query()->where('type', 'video'))
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Image')
                    ->getStateUsing(fn (Article $record) => asset('storage/' . $record->cover_image)),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('author.name')
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
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'pending' => 'Pending Review',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\SelectFilter::make('author')
                    ->relationship('author', 'name'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Status')
                    ->indicator('Featured'),
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from'),
                        Forms\Components\DatePicker::make('published_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    }),
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
            // 'view' => Pages\ViewArticle::route('/{record}'),
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
