<?php

namespace App\Filament\Resources\RecordingInstruments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RecordingInstrumentForm
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
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('subtitle')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Image')
                    ->image()
                    ->disk('public_assets')
                    ->directory('frontend/assets/img/instruments')
                    ->visibility('public')
                    ->required(),
                TextInput::make('detail_slug')
                    ->maxLength(100)
                    ->rule('alpha_dash')
                    ->unique(ignoreRecord: true)
                    ->default(null),
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
