<?php

namespace App\Filament\Resources\InstrumentCategories;

use App\Filament\Resources\InstrumentCategories\Pages\CreateInstrumentCategory;
use App\Filament\Resources\InstrumentCategories\Pages\EditInstrumentCategory;
use App\Filament\Resources\InstrumentCategories\Pages\ListInstrumentCategories;
use App\Filament\Resources\InstrumentCategories\Schemas\InstrumentCategoryForm;
use App\Filament\Resources\InstrumentCategories\Tables\InstrumentCategoriesTable;
use App\Models\InstrumentCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InstrumentCategoryResource extends Resource
{
    protected static ?string $model = InstrumentCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static string|\UnitEnum|null $navigationGroup = 'Site Content';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return InstrumentCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstrumentCategoriesTable::configure($table);
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
            'index' => ListInstrumentCategories::route('/'),
            'create' => CreateInstrumentCategory::route('/create'),
            'edit' => EditInstrumentCategory::route('/{record}/edit'),
        ];
    }
}
