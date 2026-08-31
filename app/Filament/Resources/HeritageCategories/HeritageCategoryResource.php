<?php

namespace App\Filament\Resources\HeritageCategories;

use App\Filament\Resources\HeritageCategories\Pages\CreateHeritageCategory;
use App\Filament\Resources\HeritageCategories\Pages\EditHeritageCategory;
use App\Filament\Resources\HeritageCategories\Pages\ListHeritageCategories;
use App\Filament\Resources\HeritageCategories\Schemas\HeritageCategoryForm;
use App\Filament\Resources\HeritageCategories\Tables\HeritageCategoriesTable;
use App\Models\HeritageCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeritageCategoryResource extends Resource
{
    protected static ?string $model = HeritageCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static string|\UnitEnum|null $navigationGroup = 'Site Content';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return HeritageCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeritageCategoriesTable::configure($table);
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
            'index' => ListHeritageCategories::route('/'),
            'create' => CreateHeritageCategory::route('/create'),
            'edit' => EditHeritageCategory::route('/{record}/edit'),
        ];
    }
}
