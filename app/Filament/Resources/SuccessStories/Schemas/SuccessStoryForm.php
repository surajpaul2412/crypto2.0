<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SuccessStoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('role')
                    ->label('Role / credentials line')
                    ->helperText('e.g. "Oscar · BAFTA · Golden Globe · Slumdog Millionaire"')
                    ->required()
                    ->maxLength(255),
                TextInput::make('card_quote')
                    ->label('Card pull-quote')
                    ->helperText('Short highlighted line shown on the story card in the grid, e.g. "Very intrigued by this — wishing you the best."')
                    ->required()
                    ->maxLength(160)
                    ->columnSpanFull(),
                Textarea::make('quote')
                    ->label('Full quote')
                    ->helperText('Shown in the detail modal when the card is opened.')
                    ->rows(5)
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('teaser')
                    ->label('Internal summary (optional)')
                    ->helperText('Not shown on the site yet — kept for internal reference / future use.')
                    ->rows(2)
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Photo (optional)')
                    ->helperText('Leave empty to show initials instead of a photo.')
                    ->image()
                    ->disk('public_assets')
                    ->directory('frontend/assets/img/success-stories')
                    ->visibility('public'),
                TextInput::make('youtube_id')
                    ->label('YouTube video ID (optional)')
                    ->helperText('Just the ID, e.g. "bKdvio9KrH4" from youtube.com/watch?v=bKdvio9KrH4 — leave blank for a text-only testimonial.')
                    ->maxLength(64),
                TagsInput::make('credits')
                    ->label('Credits')
                    ->helperText('Press enter after each film/project/production credit.')
                    ->columnSpanFull(),
                Textarea::make('note')
                    ->label('Attribution note (optional)')
                    ->helperText('Only used for softened-attribution entries — a small disclaimer line shown under the quote.')
                    ->rows(2)
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Active (visible on Success Stories page)')
                    ->required()
                    ->default(true),
            ]);
    }
}
