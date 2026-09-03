<?php

namespace App\Filament\Resources\RecordingInstruments\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VideosRelationManager extends RelationManager
{
    protected static string $relationship = 'videos';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('yt_id')
                    ->label('YouTube video ID')
                    ->required(),
                TextInput::make('role_label')
                    ->label('Role (e.g. "Performance")')
                    ->required(),
                TextInput::make('caption')
                    ->required(),
                TextInput::make('duration_label')
                    ->label('Duration (display text, e.g. "2:14")')
                    ->default(null),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('caption')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('role_label'),
                TextColumn::make('caption')
                    ->limit(50),
                TextColumn::make('yt_id')
                    ->label('YouTube ID'),
                TextColumn::make('duration_label')
                    ->label('Duration'),
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
