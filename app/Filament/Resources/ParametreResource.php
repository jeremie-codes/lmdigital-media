<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParametreResource\Pages;
use App\Filament\Resources\ParametreResource\RelationManagers;
use App\Models\Parametre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParametreResource extends Resource
{
    protected static ?string $model = Parametre::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $label = 'Paramètres';
    protected static ?string $navigationGroup = 'Autres options';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations légales')
                    ->columns(1)
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('type d\'information')
                            ->options([
                                'phone' => 'Téléphone',
                                'email' => 'Email',
                                'address' => 'Adresse',
                                'whatsapp' => 'WhatsApp',
                                'facebook' => 'Facebook',
                                'instagram' => 'Instagram',
                                'twitter' => 'Twitter',
                                'youtube' => 'YouTube',
                                'linkedin' => 'LinkedIn',
                                'numeropub' => 'contact pour publicité',
                            ])
                            ->placeholder('Choisir le type')
                            ->required(),
                        Forms\Components\TextInput::make('data')
                            ->label('Information')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('data')
                    ->label('Information')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListParametres::route('/'),
            'create' => Pages\CreateParametre::route('/create'),
            'edit' => Pages\EditParametre::route('/{record}/edit'),
        ];
    }
}
