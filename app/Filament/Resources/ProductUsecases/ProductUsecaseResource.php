<?php

namespace App\Filament\Resources\ProductUsecases;

use App\Filament\Resources\ProductUsecases\Pages\CreateProductUsecase;
use App\Filament\Resources\ProductUsecases\Pages\EditProductUsecase;
use App\Filament\Resources\ProductUsecases\Pages\ListProductUsecases;
use App\Filament\Resources\ProductUsecases\Schemas\ProductUsecaseForm;
use App\Filament\Resources\ProductUsecases\Tables\ProductUsecasesTable;
use App\Models\ProductUsecase;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductUsecaseResource extends Resource
{
    protected static ?string $model = ProductUsecase::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLightBulb;

    protected static string|\UnitEnum|null $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return ProductUsecaseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductUsecasesTable::configure($table);
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
            'index' => ListProductUsecases::route('/'),
            'create' => CreateProductUsecase::route('/create'),
            'edit' => EditProductUsecase::route('/{record}/edit'),
        ];
    }
}
