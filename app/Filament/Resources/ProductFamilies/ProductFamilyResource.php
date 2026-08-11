<?php

namespace App\Filament\Resources\ProductFamilies;

use App\Filament\Resources\ProductFamilies\Pages\CreateProductFamily;
use App\Filament\Resources\ProductFamilies\Pages\EditProductFamily;
use App\Filament\Resources\ProductFamilies\Pages\ListProductFamilies;
use App\Filament\Resources\ProductFamilies\Schemas\ProductFamilyForm;
use App\Filament\Resources\ProductFamilies\Tables\ProductFamiliesTable;
use App\Models\ProductFamily;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductFamilyResource extends Resource
{
    protected static ?string $model = ProductFamily::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ProductFamilyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductFamiliesTable::configure($table);
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
            'index' => ListProductFamilies::route('/'),
            'create' => CreateProductFamily::route('/create'),
            'edit' => EditProductFamily::route('/{record}/edit'),
        ];
    }
}
