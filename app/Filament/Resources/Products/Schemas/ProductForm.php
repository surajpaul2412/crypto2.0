<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Parfaitementweb\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        // Relationship selects (family/region/moods/usecases/tags) all point at a
        // translatable `label` column. Filament's relationship() options/search
        // normally pluck that column with a raw query, which would show the raw
        // {"en":"..."} JSON — getOptionLabelFromRecordUsing() instead reads the
        // label off a hydrated model, so it goes through the translation accessor.
        $labelFromRecord = fn (Model $record) => $record->label;

        return $schema
            ->components([
                Select::make('family_id')
                    ->label('Family')
                    ->relationship('family', 'label')
                    ->getOptionLabelFromRecordUsing($labelFromRecord)
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('region_id')
                    ->label('Region')
                    ->relationship('region', 'label')
                    ->getOptionLabelFromRecordUsing($labelFromRecord)
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->rule('alpha_dash')
                    ->unique(ignoreRecord: true),
                TranslatableContainer::make(
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                )->onlyMainLocaleRequired(),
                TranslatableContainer::make(
                    TextInput::make('tagline')
                        ->required()
                        ->maxLength(500)
                        ->columnSpanFull()
                )->onlyMainLocaleRequired(),
                TranslatableContainer::make(
                    TextInput::make('family_label_override')
                        ->label('Family label override')
                        ->helperText('Optional — overrides the family name shown on this product only.')
                        ->maxLength(100)
                        ->default(null)
                ),
                TranslatableContainer::make(
                    TextInput::make('region_label_override')
                        ->label('Region label override')
                        ->helperText('Optional — overrides the region name shown on this product only.')
                        ->maxLength(100)
                        ->default(null)
                ),
                FileUpload::make('image_path')
                    ->label('Image')
                    ->image()
                    ->disk('public_assets')
                    ->directory('frontend/assets/img/products')
                    ->visibility('public')
                    ->required(),
                TextInput::make('price')
                    ->label('Price (USD)')
                    ->helperText('Shown to everyone outside India.')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                TextInput::make('price_inr')
                    ->label('Price override (INR)')
                    ->helperText('Optional — shown to visitors browsing from India instead of the USD price above. Leave blank to show them the USD price too.')
                    ->numeric()
                    ->minValue(0)
                    ->prefix('₹')
                    ->default(null),
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
                    ->getOptionLabelFromRecordUsing($labelFromRecord)
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Select::make('usecases')
                    ->relationship('usecases', 'label')
                    ->getOptionLabelFromRecordUsing($labelFromRecord)
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Select::make('tags')
                    ->relationship('tags', 'label')
                    ->getOptionLabelFromRecordUsing($labelFromRecord)
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
            ]);
    }
}
