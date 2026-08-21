<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('designation')
                    ->label('Designation')
                    ->helperText('e.g. Developer, Live-Sound Engineering, Recording Director')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Bio')
                    ->rows(4)
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Photo')
                    ->image()
                    ->disk('public_assets')
                    ->directory('frontend/assets/img/family')
                    ->visibility('public')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Active (visible on About page)')
                    ->required()
                    ->default(true),
            ]);
    }
}
