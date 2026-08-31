<?php

namespace App\Filament\Resources\HeritagePerformances;

use App\Filament\Resources\HeritagePerformances\Pages\CreateHeritagePerformance;
use App\Filament\Resources\HeritagePerformances\Pages\EditHeritagePerformance;
use App\Filament\Resources\HeritagePerformances\Pages\ListHeritagePerformances;
use App\Filament\Resources\HeritagePerformances\Schemas\HeritagePerformanceForm;
use App\Filament\Resources\HeritagePerformances\Tables\HeritagePerformancesTable;
use App\Models\HeritagePerformance;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeritagePerformanceResource extends Resource
{
    protected static ?string $model = HeritagePerformance::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFilm;

    protected static string|\UnitEnum|null $navigationGroup = 'Site Content';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return HeritagePerformanceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeritagePerformancesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHeritagePerformances::route('/'),
            'create' => CreateHeritagePerformance::route('/create'),
            'edit' => EditHeritagePerformance::route('/{record}/edit'),
        ];
    }
}
