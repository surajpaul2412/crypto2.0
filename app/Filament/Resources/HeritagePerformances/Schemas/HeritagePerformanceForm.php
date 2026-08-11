<?php

namespace App\Filament\Resources\HeritagePerformances\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeritagePerformanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'label')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('youtube_url')
                    ->url()
                    ->required()
                    ->helperText('Any YouTube link shape (watch, youtu.be, embed, shorts) — the video ID is extracted automatically.'),
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('subtitle')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('lightbox_title')
                    ->maxLength(255)
                    ->default(null)
                    ->helperText('Shown in the video lightbox caption. Falls back to the title above if left blank.'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->required()
                    ->default(true),
            ]);
    }
}
