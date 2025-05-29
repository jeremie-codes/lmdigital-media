<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;


    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $label = 'Bannières';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations')
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('image')
                            ->label('Image')
                            ->directory('banners')
                            ->image()
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Actif')
                            ->default(true),
                    ]),
            ])->columns(1);
            //     TextInput::make('title')
            //         ->label('Titre')
            //         ->maxLength(255),
            //     FileUpload::make('image')
            //         ->label('Image')
            //         ->directory('banners')
            //         ->image()
            //         ->required(),
            //     Toggle::make('is_active')
            //         ->label('Actif')
            //         ->default(true),
            ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Image')->square(),
                TextColumn::make('title')->label('Titre'),
                BooleanColumn::make('is_active')->label('Actif'),
                TextColumn::make('created_at')->dateTime('d/m/Y'),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
