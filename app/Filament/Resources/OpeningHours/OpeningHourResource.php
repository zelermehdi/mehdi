<?php

namespace App\Filament\Resources\OpeningHours;

use App\Filament\Resources\OpeningHours\Pages\CreateOpeningHour;
use App\Filament\Resources\OpeningHours\Pages\EditOpeningHour;
use App\Filament\Resources\OpeningHours\Pages\ListOpeningHours;
use App\Models\OpeningHour;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class OpeningHourResource extends Resource
{
    protected static ?string $model = OpeningHour::class;

    protected static ?string $navigationLabel = 'Horaires';

    // Filament v4 : BackedEnum|string|null
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-clock';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('day_of_week')
                ->label('Jour')
                ->options([
                    1 => 'Lundi',
                    2 => 'Mardi',
                    3 => 'Mercredi',
                    4 => 'Jeudi',
                    5 => 'Vendredi',
                    6 => 'Samedi',
                    7 => 'Dimanche',
                ])
                ->required()
                ->unique(ignoreRecord: true), // évite 2 lignes “Mardi”
                // ->native(false) // optionnel si tu veux le select stylé

            Toggle::make('is_closed')
                ->label('Fermé')
                ->inline(false)
                ->reactive(),

            TimePicker::make('opens_at')
                ->label('Ouvre à')
                ->seconds(false)
                ->visible(fn ($get) => ! (bool) $get('is_closed'))
                ->required(fn ($get) => ! (bool) $get('is_closed'))
                ->dehydrated(fn ($get) => ! (bool) $get('is_closed')),

            TimePicker::make('closes_at')
                ->label('Ferme à')
                ->seconds(false)
                ->visible(fn ($get) => ! (bool) $get('is_closed'))
                ->required(fn ($get) => ! (bool) $get('is_closed'))
                ->dehydrated(fn ($get) => ! (bool) $get('is_closed')),
        ]);
    }

    public static function table(Table $table): Table
    {
        $dayNames = [
            1 => 'Lundi',
            2 => 'Mardi',
            3 => 'Mercredi',
            4 => 'Jeudi',
            5 => 'Vendredi',
            6 => 'Samedi',
            7 => 'Dimanche',
        ];

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day_of_week')
                    ->label('Jour')
                    ->formatStateUsing(fn ($state) => $dayNames[$state] ?? $state)
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_closed')
                    ->label('Fermé')
                    ->boolean(),

                Tables\Columns\TextColumn::make('opens_at')
                    ->label('Ouvre à')
                    ->placeholder('—')
                    ->sortable(),

                Tables\Columns\TextColumn::make('closes_at')
                    ->label('Ferme à')
                    ->placeholder('—')
                    ->sortable(),
            ])
            ->defaultSort('day_of_week');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOpeningHours::route('/'),
            'create' => CreateOpeningHour::route('/create'),
            'edit' => EditOpeningHour::route('/{record}/edit'),
        ];
    }
}
