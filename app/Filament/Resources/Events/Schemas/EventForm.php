<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(120),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->rows(5)
                    ->maxLength(2000),

                DateTimePicker::make('starts_at')
                    ->seconds(false),

                DateTimePicker::make('ends_at')
                    ->seconds(false)
                    ->afterOrEqual('starts_at'),

                FileUpload::make('image_url')
                    ->label('Image')
                    ->image()
                    ->disk('public')              // ✅ IMPORTANT
                    ->directory('events')         // ✅ stockage: storage/app/public/events
                    ->visibility('public')        // ✅ accessible via /storage
                    ->imageEditor()               // optionnel
                    ->maxSize(4096)               // 4MB
                    ->openable()
                    ->downloadable(),

                Toggle::make('is_active')
                    ->label('Actif')
                    ->default(true)
                    ->required(),
            ]);
    }
}
