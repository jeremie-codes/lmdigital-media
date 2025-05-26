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
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Image')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Image de l\'annonce (facultatif)')
                            ->image()
                            ->maxSize(2048) // 2MB
                            ->directory('covers'),
                    ]),
                Section::make('Titre de l\'annonce')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->options([
                                    'Publicité' => 'Publicité',
                                    'Communiqué' => 'Communiqué',
                                    'Autres' => 'Autres',
                                ])
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
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Image')
                    ->getStateUsing(fn (Annonce $record) => asset('storage/' . $record->image)),
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('contenu')->limit(30),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
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
