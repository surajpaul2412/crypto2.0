<?php

namespace App\Filament\Resources\RecordingInstruments;

use App\Filament\Resources\RecordingInstruments\Pages\CreateRecordingInstrument;
use App\Filament\Resources\RecordingInstruments\Pages\EditRecordingInstrument;
use App\Filament\Resources\RecordingInstruments\Pages\ListRecordingInstruments;
use App\Filament\Resources\RecordingInstruments\RelationManagers\AnatomyPartsRelationManager;
use App\Filament\Resources\RecordingInstruments\RelationManagers\FaqsRelationManager;
use App\Filament\Resources\RecordingInstruments\RelationManagers\PairsRelationManager;
use App\Filament\Resources\RecordingInstruments\RelationManagers\TracksRelationManager;
use App\Filament\Resources\RecordingInstruments\RelationManagers\VariantsRelationManager;
use App\Filament\Resources\RecordingInstruments\RelationManagers\VideosRelationManager;
use App\Filament\Resources\RecordingInstruments\Schemas\RecordingInstrumentForm;
use App\Filament\Resources\RecordingInstruments\Tables\RecordingInstrumentsTable;
use App\Models\RecordingInstrument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RecordingInstrumentResource extends Resource
{
    protected static ?string $model = RecordingInstrument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMicrophone;

    protected static string|\UnitEnum|null $navigationGroup = 'Site Content';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return RecordingInstrumentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecordingInstrumentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            VideosRelationManager::class,
            TracksRelationManager::class,
            AnatomyPartsRelationManager::class,
            VariantsRelationManager::class,
            PairsRelationManager::class,
            FaqsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecordingInstruments::route('/'),
            'create' => CreateRecordingInstrument::route('/create'),
            'edit' => EditRecordingInstrument::route('/{record}/edit'),
        ];
    }
}
