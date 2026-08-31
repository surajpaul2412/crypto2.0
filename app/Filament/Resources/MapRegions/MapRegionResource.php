<?php

namespace App\Filament\Resources\MapRegions;

use App\Filament\Resources\MapRegions\Pages\EditMapRegion;
use App\Filament\Resources\MapRegions\Pages\ListMapRegions;
use App\Filament\Resources\MapRegions\Schemas\MapRegionForm;
use App\Filament\Resources\MapRegions\Tables\MapRegionsTable;
use App\Models\MapRegion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

/**
 * Homepage India map popup content — one row per state/UT, seeded once
 * (MapRegionSeeder) to match the 36 <g class="state-group"> ids in the
 * map SVG (welcome-content.blade.php). Deliberately edit-only: the set of
 * states is fixed geography, so create/delete are disabled (see below and
 * getPages() — no 'create' route registered).
 */
class MapRegionResource extends Resource
{
    protected static ?string $model = MapRegion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMap;

    protected static string|\UnitEnum|null $navigationGroup = 'Site Content';

    protected static ?string $navigationLabel = 'Homepage Map';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return MapRegionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MapRegionsTable::configure($table);
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
            'index' => ListMapRegions::route('/'),
            'edit' => EditMapRegion::route('/{record}/edit'),
        ];
    }
}
