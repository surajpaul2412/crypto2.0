<?php

namespace App\Filament\Resources\RecordingInstruments\RelationManagers;

use App\Models\RecordingInstrument;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PairsRelationManager extends RelationManager
{
    protected static string $relationship = 'pairs';

    protected static ?string $title = 'Pairs well with';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('paired_instrument_id')
                    ->label('Paired instrument')
                    ->options(fn () => RecordingInstrument::query()
                        ->where('id', '!=', $this->getOwnerRecord()->id)
                        ->orderBy('name')
                        ->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('relationship_label')
                    ->label('Relationship label')
                    ->helperText('e.g. "rhythmic counterpart"')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('why_bullets')
                    ->label('"Why pair" bullets')
                    ->simple(
                        TextInput::make('bullet')->required()
                    )
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
            ->recordTitleAttribute('relationship_label')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('pairedInstrument.name')
                    ->label('Paired instrument'),
                TextColumn::make('relationship_label')
                    ->label('Relationship'),
                TextColumn::make('description')
                    ->limit(50),
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
