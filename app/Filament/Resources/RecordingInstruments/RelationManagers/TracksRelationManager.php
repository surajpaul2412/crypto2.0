<?php

namespace App\Filament\Resources\RecordingInstruments\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

/**
 * Manages BOTH "Listen" demo tracks (§1B) and "Articulations" tracks (§4) —
 * they share one table (`type` discriminates), matching the single
 * `track-card` component both sections render on the frontend.
 */
class TracksRelationManager extends RelationManager
{
    protected static string $relationship = 'tracks';

    protected static ?string $title = 'Audio tracks (demos & articulations)';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->options([
                        'demo' => 'Demo (Listen section)',
                        'articulation' => 'Articulation (Phrase precision section)',
                    ])
                    ->required()
                    ->live(),
                TextInput::make('art_id')
                    ->label('Articulation ID (slug, articulations only)')
                    ->helperText('e.g. "meend" — leave blank for demo tracks')
                    ->visible(fn ($get) => $get('type') === 'articulation'),
                TextInput::make('tag_label')
                    ->label('Tag')
                    ->helperText('e.g. "Cinematic" for a demo, "pitch glide" for an articulation')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('audio_path')
                    ->label('Audio file')
                    ->disk('public_assets')
                    ->directory('frontend/assets/audio/recording-instruments')
                    ->visibility('public')
                    ->acceptedFileTypes(['audio/wav', 'audio/mpeg', 'audio/mp3']),
                FileUpload::make('peaks_path')
                    ->label('Waveform peaks JSON (optional)')
                    ->disk('public_assets')
                    ->directory('frontend/assets/audio/recording-instruments/peaks')
                    ->visibility('public')
                    ->acceptedFileTypes(['application/json']),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('title'),
                TextColumn::make('tag_label')
                    ->label('Tag'),
                TextColumn::make('art_id')
                    ->label('Articulation ID')
                    ->placeholder('—'),
                TextColumn::make('audio_path')
                    ->label('Audio')
                    ->formatStateUsing(fn (?string $state) => $state ? 'Uploaded' : 'Not uploaded yet')
                    ->badge()
                    ->color(fn (?string $state) => $state ? 'success' : 'gray'),
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
