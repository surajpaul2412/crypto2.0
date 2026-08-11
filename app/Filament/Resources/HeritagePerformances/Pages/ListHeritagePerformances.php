<?php

namespace App\Filament\Resources\HeritagePerformances\Pages;

use App\Filament\Resources\HeritagePerformances\HeritagePerformanceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeritagePerformances extends ListRecords
{
    protected static string $resource = HeritagePerformanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
