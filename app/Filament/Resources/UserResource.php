<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Gestion des utilisateurs';
    protected static ?string $label = 'Utilisateur';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('User Information')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(User::class, 'email', ignoreRecord: true),
                                Forms\Components\Select::make('role')
                                    ->options([
                                        "admin" => "Admin",
                                        "Editeur" => "Editeur",
                                        "Autres" => "Autres",
                                    ]),
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->label('Mot de passe')
                                    ->dehydrateStateUsing(fn ($state) =>
                                        filled($state) ? Hash::make($state) : null
                                    )
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->required(fn (string $operation): bool => $operation === 'create'),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('Profile Image')
                            ->schema([
                                Forms\Components\FileUpload::make('profile_photo_path')
                                    ->label('Profile Photo')
                                    ->image()
                                    ->directory('profile-photos')
                                    ->maxSize(1024)
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('1:1')
                                    ->imageResizeTargetWidth('300')
                                    ->imageResizeTargetHeight('300')
                                    ->circleCropper(),
                            ]),


                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Temps de publication')
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Created At')
                                    ->content(fn (User $record): string => $record->created_at?->diffForHumans() ?? 'Never'),
                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Updated At')
                                    ->content(fn (User $record): string => $record->updated_at?->diffForHumans() ?? 'Never'),
                            ])
                            ->visibleOn('edit'),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->label('Photo')
                    ->getStateUsing(fn (User $record) => asset('storage/' . $record->profile_photo_path))
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('roles')
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Crée le')
                    ->date()
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('email_verified_at')
                    ->label('Email Verified')
                    ->placeholder('All Users')
                    ->trueLabel('Verified Users')
                    ->falseLabel('Unverified Users')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('email_verified_at'),
                        false: fn ($query) => $query->whereNull('email_verified_at'),
                        blank: fn ($query) => $query,
                    ),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All Users')
                    ->trueLabel('Active Users')
                    ->falseLabel('Inactive Users'),
                // Tables\Filters\SelectFilter::make('roles')
                //     ->relationship('roles', 'name')
                //     ->multiple()
                //     ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('verifyEmails')
                        ->label('Verify Emails')
                        ->icon('heroicon-o-check-badge')
                        ->action(function (Collection $records) {
                            $records->each(function (User $user) {
                                $user->email_verified_at = now();
                                $user->save();
                            });
                        }),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
