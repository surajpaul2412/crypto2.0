<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('family_id')
                    ->label('Family')
                    ->relationship('family', 'label')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('region_id')
                    ->label('Region')
                    ->relationship('region', 'label')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->rule('alpha_dash')
                    ->unique(ignoreRecord: true),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('tagline')
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),
                TextInput::make('family_label_override')
                    ->label('Family label override')
                    ->helperText('Optional — overrides the family name shown on this product only.')
                    ->maxLength(100)
                    ->default(null),
                TextInput::make('region_label_override')
                    ->label('Region label override')
                    ->helperText('Optional — overrides the region name shown on this product only.')
                    ->maxLength(100)
                    ->default(null),
                FileUpload::make('image_path')
                    ->label('Image')
                    ->image()
                    ->disk('public_assets')
                    ->directory('frontend/assets/img/products')
                    ->visibility('public')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                TextInput::make('format')
                    ->required()
                    ->maxLength(60)
                    ->default('kontakt'),
                TextInput::make('artist')
                    ->maxLength(255)
                    ->default(null),
                Toggle::make('flagship')
                    ->required()
                    ->default(false),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_published')
                    ->required()
                    ->default(true),
                Select::make('moods')
                    ->relationship('moods', 'label')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Select::make('usecases')
                    ->relationship('usecases', 'label')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Select::make('tags')
                    ->relationship('tags', 'label')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
            ]);
    }
}
