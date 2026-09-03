<?php

namespace App\Filament\Resources\RecordingInstruments\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AnatomyPartsRelationManager extends RelationManager
{
    protected static string $relationship = 'anatomyParts';

    protected static ?string $title = 'Anatomy hotspots';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->helperText('e.g. "Pegbox"')
                    ->required(),
                TextInput::make('sub_label')
                    ->label('Sub-label (optional)')
                    ->helperText('e.g. "movable frets"'),
                TextInput::make('legend_role')
                    ->label('Legend line')
                    ->helperText('Short line shown in the sidebar legend list.')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('tooltip_text')
                    ->label('Tooltip / detail text')
                    ->helperText('Shown on hover/tap and in the "active part" panel.')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('hotspot_x_pct')
                    ->label('Hotspot X position (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),
                TextInput::make('hotspot_y_pct')
                    ->label('Hotspot Y position (%)')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),
                Select::make('anchor')
                    ->label('Tooltip direction')
                    ->options([
                        'above' => 'Above',
                        'below' => 'Below',
                        'left' => 'Left',
                        'right' => 'Right',
                    ])
                    ->default('above')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('sort_order')
                    ->label('#')
                    ->numeric(),
                TextColumn::make('name'),
                TextColumn::make('sub_label')
                    ->placeholder('—'),
                TextColumn::make('legend_role')
                    ->limit(50),
                TextColumn::make('hotspot_x_pct')
                    ->label('X%'),
                TextColumn::make('hotspot_y_pct')
                    ->label('Y%'),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
