<?php

namespace App\Filament\Resources\ProductRegions;

use App\Filament\Resources\ProductRegions\Pages\CreateProductRegion;
use App\Filament\Resources\ProductRegions\Pages\EditProductRegion;
use App\Filament\Resources\ProductRegions\Pages\ListProductRegions;
use App\Filament\Resources\ProductRegions\Schemas\ProductRegionForm;
use App\Filament\Resources\ProductRegions\Tables\ProductRegionsTable;
use App\Models\ProductRegion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductRegionResource extends Resource
{
    protected static ?string $model = ProductRegion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static string|\UnitEnum|null $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ProductRegionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductRegionsTable::configure($table);
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
            'index' => ListProductRegions::route('/'),
            'create' => CreateProductRegion::route('/create'),
            'edit' => EditProductRegion::route('/{record}/edit'),
        ];
    }
}
