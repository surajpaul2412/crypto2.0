<?php

namespace App\Filament\Resources\ProductMoods;

use App\Filament\Resources\ProductMoods\Pages\CreateProductMood;
use App\Filament\Resources\ProductMoods\Pages\EditProductMood;
use App\Filament\Resources\ProductMoods\Pages\ListProductMoods;
use App\Filament\Resources\ProductMoods\Schemas\ProductMoodForm;
use App\Filament\Resources\ProductMoods\Tables\ProductMoodsTable;
use App\Models\ProductMood;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductMoodResource extends Resource
{
    protected static ?string $model = ProductMood::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return ProductMoodForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductMoodsTable::configure($table);
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
            'index' => ListProductMoods::route('/'),
            'create' => CreateProductMood::route('/create'),
            'edit' => EditProductMood::route('/{record}/edit'),
        ];
    }
}
