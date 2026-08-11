<?php

namespace App\Filament\Resources\ProductMoods\Pages;

use App\Filament\Resources\ProductMoods\ProductMoodResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductMoods extends ListRecords
{
    protected static string $resource = ProductMoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
