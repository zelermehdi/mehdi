<?php

namespace App\Filament\Resources\OpeningHours\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OpeningHourForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('day_of_week')
                    ->required()
                    ->numeric(),
                Toggle::make('is_closed')
                    ->required(),
                TimePicker::make('opens_at'),
                TimePicker::make('closes_at'),
            ]);
    }
}
