<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BreakingNewsResource\Pages;
use App\Filament\Resources\BreakingNewsResource\RelationManagers;
use App\Models\BreakingNews;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BreakingNewsResource extends Resource
{
    protected static ?string $model = BreakingNews::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Titre')
                    ->schema([
                        Forms\Components\Select::make('title')
                            ->required()
                            ->options(Category::all()->pluck('name', 'name'))
                            ->label('Catégorie de l\'actualité')
                            ->placeholder('Sélectionnez une catégorie'),
                    ]),
                Section::make('Contenu')
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->required()
                            ->label('Contenu du breaking news')
                            ->placeholder('Entrez le contenu de l\'actualité'),
                    ]),
                Section::make('Statut')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Actif')
                            ->default(true)
                            ->helperText('Activez pour afficher cette actualité'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Categorie')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('content')
                    ->label('Contenu')
                    ->limit(50)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_active')
                    ->label('Actif'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable(),
            ])->filters([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBreakingNews::route('/'),
            'create' => Pages\CreateBreakingNews::route('/create'),
            'edit' => Pages\EditBreakingNews::route('/{record}/edit'),
        ];
    }
}
