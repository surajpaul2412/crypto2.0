<?php

namespace App\Filament\Resources\InstrumentCategories\Pages;

use App\Filament\Resources\InstrumentCategories\InstrumentCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInstrumentCategories extends ListRecords
{
    protected static string $resource = InstrumentCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
