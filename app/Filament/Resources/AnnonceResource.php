<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnonceResource\Pages;
use App\Filament\Resources\AnnonceResource\RelationManagers;
use App\Models\Annonce;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnnonceResource extends Resource
{
    protected static ?string $model = Annonce::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Options & services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Titre de l\'annonce')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('categorie')
                            ->options([
                                    'Publicité' => 'Publicité',
                                    'Communiqué' => 'Communiqué',
                                    'Avis de recherche' => 'Avis de recherche',
                                    'Autres' => 'Autres',
                                ])
                            ->label('Titre')
                            ->required(),
                        Forms\Components\TextInput::make('sous_titre')
                            ->label('Sous titre (facultatif)'),
                    ]),
                Section::make('Contenu de l\'annonce')
                    ->columns(1)
                    ->schema([
                        RichEditor::make('contenu')
                            ->required()
                            ->label('')
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categorie')
                    ->sortable()
                    ->searchable()
                    ->label('Titre'),
                Tables\Columns\TextColumn::make('sous_titre'),
                Tables\Columns\TextColumn::make('contenu'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->label('Supprimer'),
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
            'index' => Pages\ListAnnonces::route('/'),
            'create' => Pages\CreateAnnonce::route('/create'),
            'edit' => Pages\EditAnnonce::route('/{record}/edit'),
        ];
    }
}
