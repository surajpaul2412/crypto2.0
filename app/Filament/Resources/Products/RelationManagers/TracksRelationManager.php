<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

/**
 * Upload WAV/MP3 demo tracks for this product. Whatever is uploaded here is
 * exactly what plays on the product page — add, remove or reorder tracks
 * and the "Listen" section updates to match, no other step needed.
 *
 * Files go to the private `r2` disk (Cloudflare R2) — the frontend never
 * gets a link to these masters, only to the clipped, time-limited preview
 * route (see ProductTrackPreviewController). The upload preview/download
 * link shown here in the admin is itself a short-lived signed R2 URL, not
 * a public one.
 */
class TracksRelationManager extends RelationManager
{
    protected static string $relationship = 'tracks';

    protected static ?string $title = 'Demo tracks';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(120)
                    ->default('Demo'),
                FileUpload::make('audio_path')
                    ->label('Audio file (WAV or MP3)')
                    ->disk('r2')
                    ->directory('product-tracks')
                    ->visibility('private')
                    ->acceptedFileTypes(['audio/wav', 'audio/x-wav', 'audio/mpeg', 'audio/mp3'])
                    ->required()
                    ->helperText('The full file is stored privately — only a short preview clip is ever served to visitors.'),
                TextInput::make('preview_seconds')
                    ->label('Preview length (seconds)')
                    ->helperText('How much of the track visitors can hear. 30–60 seconds is typical.')
                    ->numeric()
                    ->minValue(10)
                    ->maxValue(120)
                    ->default(45)
                    ->required(),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('mime_type')
                    ->label('Format')
                    ->formatStateUsing(fn (?string $state) => $state === 'audio/wav' ? 'WAV' : 'MP3')
                    ->badge(),
                TextColumn::make('preview_seconds')
                    ->label('Preview length')
                    ->suffix('s'),
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
