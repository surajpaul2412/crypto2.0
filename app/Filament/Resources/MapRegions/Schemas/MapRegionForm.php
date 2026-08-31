<?php

namespace App\Filament\Resources\MapRegions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MapRegionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('State / UT')
                    ->helperText('Fixed geography — matches the homepage map SVG, not editable here.')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('type')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('region')
                    ->disabled()
                    ->dehydrated(false),
                Textarea::make('tradition')
                    ->label('Music tradition')
                    ->helperText('The description shown in the map popup body.')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('instruments')
                    ->label('Signature instruments')
                    ->helperText('Comma-separated, e.g. "Santoor, Rabab, Sarangi, Tumbaknari"')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('library_url')
                    ->label('"Explore Library" link')
                    ->helperText("Where the popup's primary button goes. Defaults to /shop if left blank.")
                    ->maxLength(255),
                TextInput::make('collab_url')
                    ->label('"Collaborate" link')
                    ->helperText("Where the popup's secondary button goes. Defaults to /collaboration if left blank.")
                    ->maxLength(255),
            ]);
    }
}
