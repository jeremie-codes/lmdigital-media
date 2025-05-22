<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentaireResource\Pages;
use App\Filament\Resources\CommentaireResource\RelationManagers;
use App\Models\Commentaire;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentaireResource extends Resource
{
    protected static ?string $model = Commentaire::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Options & services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Commentaire')
                    ->columns(1)
                    ->schema([
                        Forms\Components\TextInput::make('nom')
                            ->label('Nom')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                        Forms\Components\Select::make('actualite_id')
                            ->label('Actualité')
                            ->relationship('actualite', 'titre') // Relation avec le modèle Actualite
                            ->required(),


                    ]),
                Section::make('Contenu')
                    ->columns(1)
                    ->schema([
                        Forms\Components\RichEditor::make('commentaire')
                            ->label('Commentaire')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')->label('Nom'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('commentaire')->label('Commentaire')->limit(50),
                Tables\Columns\TextColumn::make('actualite.titre')->limit(30)
                    ->label('Article')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Date de création')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCommentaires::route('/'),
            'create' => Pages\CreateCommentaire::route('/create'),
            'edit' => Pages\EditCommentaire::route('/{record}/edit'),
        ];
    }
}
