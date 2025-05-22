<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpinionEtDecouverteResource\Pages;
use App\Filament\Resources\OpinionEtDecouverteResource\RelationManagers;
use App\Models\OpinionEtDecouverte;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;

class OpinionEtDecouverteResource extends Resource
{
    protected static ?string $model = OpinionEtDecouverte::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Options & services';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('categorie')
                    ->options([
                        'Opinion' => 'Opinion',
                        'Decouverte' => 'Découverte',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('titre')
                    ->required(),
                Forms\Components\TextInput::make('sous_titre')
                    ->label('Sous titre (facultatif)'),
                Forms\Components\TextInput::make('video')
                    ->label('Lien Vidéo youtube NB: Mettez soit un lien ou une photo en bas !!! '),
                Forms\Components\Textarea::make('contenu')
                    ->rows(5)
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->label('Photo de l\'article (NB: Soit vous mettez le lien de youtube ci-haut ou une photo !!!)')
                    ->directory('opignon-images')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('categorie')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('titre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('sous_titre'),
                Tables\Columns\TextColumn::make('contenu')->limit(50),
                Tables\Columns\TextColumn::make('video')->limit(50),
                Tables\Columns\ImageColumn::make('image')->limit(50),
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
            'index' => Pages\ListOpinionEtDecouvertes::route('/'),
            'create' => Pages\CreateOpinionEtDecouverte::route('/create'),
            'edit' => Pages\EditOpinionEtDecouverte::route('/{record}/edit'),
        ];
    }
}
