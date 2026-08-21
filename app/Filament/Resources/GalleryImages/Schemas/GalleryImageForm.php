<?php

namespace App\Filament\Resources\GalleryImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('caption')
                    ->label('Name / Caption')
                    ->helperText('Shown on hover and in the lightbox — e.g. "Mixing Console", "Live Room"')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image_path')
                    ->label('Photo')
                    ->image()
                    ->disk('public_assets')
                    ->directory('frontend/assets/img/gallery')
                    ->visibility('public')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Active (visible in gallery)')
                    ->required()
                    ->default(true),
            ]);
    }
}
