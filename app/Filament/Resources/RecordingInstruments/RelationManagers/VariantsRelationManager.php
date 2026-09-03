<?php

namespace App\Filament\Resources\RecordingInstruments\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'variants';

    protected static ?string $title = 'Variants (which one to book)';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('chip_label')
                    ->label('Chip label')
                    ->helperText('e.g. "Maihar Gharana"')
                    ->required(),
                TextInput::make('name')
                    ->helperText('e.g. "Gandhar-pancham"')
                    ->required(),
                TextInput::make('style_label')
                    ->label('Style label (optional)')
                    ->helperText('e.g. "Ravi Shankar style"'),
                Textarea::make('character_body')
                    ->label('Character description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('when_text')
                    ->label('When to book')
                    ->required()
                    ->columnSpanFull(),
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
                TextColumn::make('chip_label'),
                TextColumn::make('name'),
                TextColumn::make('style_label')
                    ->placeholder('—'),
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
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
