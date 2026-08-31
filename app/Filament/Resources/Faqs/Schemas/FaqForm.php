<?php

namespace App\Filament\Resources\Faqs\Schemas;

use App\Models\Faq;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('question')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                RichEditor::make('answer')
                    ->required()
                    ->columnSpanFull(),
                CheckboxList::make('pages')
                    ->label('Show on page(s)')
                    ->options(Faq::PAGES)
                    ->required()
                    ->columns(2)
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->helperText('Lower numbers show first, within each page.'),
                Toggle::make('is_active')
                    ->label('Active (visible on the site)')
                    ->required()
                    ->default(true),
            ]);
    }
}
