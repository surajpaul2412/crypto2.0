<?php

namespace App\Filament\Resources\RecordingInstruments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class RecordingInstrumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Recording instrument')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Basics')
                            ->schema(self::basicsFields()),
                        Tab::make('Hero')
                            ->schema(self::heroFields()),
                        Tab::make('What It Brings')
                            ->schema(self::bringsFields()),
                        Tab::make('Anatomy')
                            ->schema(self::anatomyFields()),
                        Tab::make('Sonic Profile')
                            ->schema(self::sonicProfileFields()),
                    ]),
            ]);
    }

    protected static function basicsFields(): array
    {
        return [
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
            Textarea::make('meta_description')
                ->label('SEO meta description')
                ->helperText('Falls back to a generic sentence when left blank.')
                ->columnSpanFull(),
            TextInput::make('icon_svg')
                ->label('Small icon (inline SVG, optional)')
                ->helperText('Shown when this instrument appears as a "pairs well with" card elsewhere. Falls back to a plain initial badge when left blank.')
                ->columnSpanFull(),
        ];
    }

    protected static function heroFields(): array
    {
        return [
            TextInput::make('subhead_accent')
                ->label('Subhead — highlighted lead')
                ->helperText('e.g. "Indian Sitar Recording Sessions"')
                ->columnSpanFull(),
            Textarea::make('subhead_body')
                ->label('Subhead — remainder of the sentence')
                ->columnSpanFull(),
            Textarea::make('tagline')
                ->columnSpanFull(),
        ];
    }

    protected static function bringsFields(): array
    {
        return [
            Repeater::make('brings')
                ->label('"What it brings" cards')
                ->helperText('The page ships a 2×2 grid — 4 cards is the intended count, though the layout tolerates more.')
                ->schema([
                    TextInput::make('eyebrow')
                        ->required()
                        ->helperText('e.g. "Emotional role"'),
                    TextInput::make('title')
                        ->required()
                        ->helperText('e.g. "The voice of longing."'),
                    RichEditor::make('body')
                        ->required(),
                ])
                ->columns(1)
                ->columnSpanFull(),
        ];
    }

    protected static function anatomyFields(): array
    {
        return [
            FileUpload::make('anatomy_image_path')
                ->label('Anatomy photo')
                ->image()
                ->disk('public_assets')
                ->directory('frontend/assets/img/instruments/anatomy')
                ->visibility('public')
                ->helperText('A real photograph of the instrument. Hotspots are added below via the Anatomy Parts tab on this record once saved.'),
            TextInput::make('anatomy_photo_aspect')
                ->label('Photo aspect ratio (CSS value)')
                ->default('3/4')
                ->helperText('e.g. "3/4", "1/1", "4/5"'),
        ];
    }

    protected static function sonicProfileFields(): array
    {
        return [
            TextInput::make('sonic_range_start_pct')
                ->label('Frequency range start (%)')
                ->numeric()
                ->minValue(0)
                ->maxValue(100),
            TextInput::make('sonic_range_end_pct')
                ->label('Frequency range end (%)')
                ->numeric()
                ->minValue(0)
                ->maxValue(100),
            TextInput::make('sonic_sweet_pct')
                ->label('Sweet-spot position (%)')
                ->numeric()
                ->minValue(0)
                ->maxValue(100),
            TextInput::make('sonic_sweet_label')
                ->label('Sweet-spot label')
                ->helperText('e.g. "sweet · 3kHz"'),
            RichEditor::make('sonic_range_caption')
                ->label('Frequency range caption')
                ->columnSpanFull(),

            TextInput::make('sonic_dynamic_range_value')
                ->label('Dynamic range — value')
                ->helperText('e.g. "Wide · 30 dB+"'),
            Textarea::make('sonic_dynamic_range_detail')
                ->label('Dynamic range — detail'),

            TextInput::make('sonic_stereo_value')
                ->label('Stereo behavior — value'),
            Textarea::make('sonic_stereo_detail')
                ->label('Stereo behavior — detail'),

            TextInput::make('sonic_mic_value')
                ->label('Mic technique — value'),
            Textarea::make('sonic_mic_detail')
                ->label('Mic technique — detail'),
        ];
    }
}
