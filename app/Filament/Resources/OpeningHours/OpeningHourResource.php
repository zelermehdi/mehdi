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

    // ✅ doit être BackedEnum|string|null (comme Resource)
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
                ->required(),

            Toggle::make('is_closed')
                ->label('Fermé')
                ->inline(false),

            TimePicker::make('opens_at')
                ->label('Ouvre à')
                ->seconds(false)
                ->disabled(fn ($get) => (bool) $get('is_closed')),

            TimePicker::make('closes_at')
                ->label('Ferme à')
                ->seconds(false)
                ->disabled(fn ($get) => (bool) $get('is_closed')),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day_of_week')
                    ->label('Jour')
                    ->formatStateUsing(fn ($state) => [
                        1 => 'Lundi',
                        2 => 'Mardi',
                        3 => 'Mercredi',
                        4 => 'Jeudi',
                        5 => 'Vendredi',
                        6 => 'Samedi',
                        7 => 'Dimanche',
                    ][$state] ?? $state)
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_closed')
                    ->label('Fermé')
                    ->boolean(),

                Tables\Columns\TextColumn::make('opens_at')
                    ->label('Ouvre à')
                    ->sortable(),

                Tables\Columns\TextColumn::make('closes_at')
                    ->label('Ferme à')
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
