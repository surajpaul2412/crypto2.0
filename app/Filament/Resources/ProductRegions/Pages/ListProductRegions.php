<?php

namespace App\Filament\Resources\ProductRegions\Pages;

use App\Filament\Resources\ProductRegions\ProductRegionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductRegions extends ListRecords
{
    protected static string $resource = ProductRegionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
