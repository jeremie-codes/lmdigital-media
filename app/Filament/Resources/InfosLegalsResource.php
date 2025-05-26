<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfosLegalsResource\Pages;
use App\Filament\Resources\InfosLegalsResource\RelationManagers;
use App\Models\InfoLegal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InfosLegalsResource extends Resource
{
    protected static ?string $model = InfoLegal::class;
    protected static ?string $navigationGroup = 'Autres options';
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?int $navigationSort = 3;

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
                                'impot' => 'Impôt',
                                'idnat' => 'Id National',
                                'rccm' => 'RCCM',
                                'inpp' => 'INPP',
                                'onem' => 'ONEM',
                                // 'cnss' => 'CNSS',
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
            'index' => Pages\ListInfosLegals::route('/'),
            'create' => Pages\CreateInfosLegals::route('/create'),
            'edit' => Pages\EditInfosLegals::route('/{record}/edit'),
        ];
    }
}
