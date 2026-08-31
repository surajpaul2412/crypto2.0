<?php

namespace App\Filament\Resources\MapRegions\Pages;

use App\Filament\Resources\MapRegions\MapRegionResource;
use Filament\Resources\Pages\ListRecords;

class ListMapRegions extends ListRecords
{
    protected static string $resource = MapRegionResource::class;

    protected function getHeaderActions(): array
    {
        // No CreateAction — the 36 states/UTs are a fixed set seeded once
        // (MapRegionSeeder) to match the homepage map SVG. Edit only.
        return [
            //
        ];
    }
}
